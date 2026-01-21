<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wallet_model extends CI_Model
{
    /**
     * Get user's current wallet balance
     */
    public function get_balance($user_id)
    {
        $this->db->select('wallet_balance');
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return (float)$row->wallet_balance;
        }
        return 0.00;
    }

    /**
     * Add money to wallet (credit)
     * @param int $user_id User ID
     * @param float $amount Amount to add
     * @param string $source Transaction source (topup, refund, etc.)
     * @param string $payment_method Payment method used
     * @param string $payment_id Payment gateway transaction ID
     * @param string $reference_id Reference ID (order_id, etc.)
     * @param string $description Transaction description
     * @return bool Success status
     */
    public function add_balance($user_id, $amount, $source = 'topup', $payment_method = null, $payment_id = null, $reference_id = null, $description = null)
    {
        if ($amount <= 0) {
            return false;
        }

        $this->db->trans_start();

        // Get current balance
        $balance_before = $this->get_balance($user_id);
        $balance_after = $balance_before + $amount;

        // Update user's wallet balance
        $this->db->where('id', $user_id);
        $this->db->set('wallet_balance', 'wallet_balance + ' . (float)$amount, FALSE);
        $this->db->update('users');

        // Record transaction
        $transaction_data = array(
            'user_id' => $user_id,
            'transaction_type' => 'credit',
            'amount' => $amount,
            'balance_before' => $balance_before,
            'balance_after' => $balance_after,
            'transaction_source' => $source,
            'payment_method' => $payment_method,
            'payment_id' => $payment_id,
            'reference_id' => $reference_id,
            'payment_status' => 'success',
            'description' => $description ?: 'Wallet top-up of ₹' . number_format($amount, 2)
        );

        $this->db->insert('wallet_transactions', $transaction_data);

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    /**
     * Deduct money from wallet (debit)
     * @param int $user_id User ID
     * @param float $amount Amount to deduct
     * @param string $source Transaction source (order, etc.)
     * @param string $reference_id Reference ID (order_id, etc.)
     * @param string $description Transaction description
     * @return bool Success status
     */
    public function deduct_balance($user_id, $amount, $source = 'order', $reference_id = null, $description = null)
    {
        if ($amount <= 0) {
            return false;
        }

        // Check if user has sufficient balance
        $current_balance = $this->get_balance($user_id);
        if ($current_balance < $amount) {
            return false; // Insufficient balance
        }

        $this->db->trans_start();

        $balance_before = $current_balance;
        $balance_after = $balance_before - $amount;

        // Update user's wallet balance
        $this->db->where('id', $user_id);
        $this->db->set('wallet_balance', 'wallet_balance - ' . (float)$amount, FALSE);
        $this->db->update('users');

        // Record transaction
        $transaction_data = array(
            'user_id' => $user_id,
            'transaction_type' => 'debit',
            'amount' => $amount,
            'balance_before' => $balance_before,
            'balance_after' => $balance_after,
            'transaction_source' => $source,
            'reference_id' => $reference_id,
            'payment_status' => 'success',
            'description' => $description ?: 'Payment for order #' . $reference_id
        );

        $this->db->insert('wallet_transactions', $transaction_data);

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    /**
     * Get wallet transaction history for a user
     * @param int $user_id User ID
     * @param int $limit Number of records to fetch (default: 50)
     * @param int $offset Offset for pagination
     * @return array Transaction records
     */
    public function get_transactions($user_id, $limit = 50, $offset = 0)
    {
        $this->db->select('*');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('wallet_transactions');

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return array();
    }

    /**
     * Get transaction by ID
     */
    public function get_transaction_by_id($transaction_id, $user_id = null)
    {
        $this->db->where('id', $transaction_id);
        if ($user_id) {
            $this->db->where('user_id', $user_id);
        }
        $query = $this->db->get('wallet_transactions');
        
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return null;
    }

    /**
     * Get total number of transactions for a user (for pagination)
     */
    public function get_transaction_count($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->count_all_results('wallet_transactions');
    }

    /**
     * Check if user has sufficient balance
     */
    public function has_sufficient_balance($user_id, $required_amount)
    {
        $balance = $this->get_balance($user_id);
        return $balance >= $required_amount;
    }

    /**
     * Get transaction statistics for user
     */
    public function get_transaction_stats($user_id)
    {
        // Total credited (all completed transactions, excluding pending/failed)
        $this->db->select_sum('amount');
        $this->db->where('user_id', $user_id);
        $this->db->where('transaction_type', 'credit');
        $this->db->where_in('payment_status', ['success', 'completed']);
        $credit_query = $this->db->get('wallet_transactions');
        $total_credited = $credit_query->row()->amount ?: 0;

        // Total debited (all completed transactions, excluding pending/failed)
        $this->db->select_sum('amount');
        $this->db->where('user_id', $user_id);
        $this->db->where('transaction_type', 'debit');
        $this->db->where_in('payment_status', ['success', 'completed']);
        $debit_query = $this->db->get('wallet_transactions');
        $total_debited = $debit_query->row()->amount ?: 0;

        // Transaction count (only successful/completed)
        $this->db->where('user_id', $user_id);
        $this->db->where_in('payment_status', ['success', 'completed']);
        $total_transactions = $this->db->count_all_results('wallet_transactions');

        return array(
            'total_credited' => (float)$total_credited,
            'total_debited' => (float)$total_debited,
            'total_transactions' => $total_transactions,
            'current_balance' => $this->get_balance($user_id)
        );
    }

    /**
     * Create a pending wallet top-up transaction
     */
    public function create_pending_topup($user_id, $amount, $payment_method, $payment_id = null)
    {
        $balance_before = $this->get_balance($user_id);
        
        $transaction_data = array(
            'user_id' => $user_id,
            'transaction_type' => 'credit',
            'amount' => $amount,
            'balance_before' => $balance_before,
            'balance_after' => $balance_before, // Not updated yet
            'transaction_source' => 'topup',
            'payment_method' => $payment_method,
            'payment_id' => $payment_id,
            'payment_status' => 'pending',
            'description' => 'Wallet top-up of ₹' . number_format($amount, 2) . ' (Pending)'
        );

        $this->db->insert('wallet_transactions', $transaction_data);
        return $this->db->insert_id();
    }

    /**
     * Complete a pending wallet top-up transaction
     */
    public function complete_topup($transaction_id, $payment_id = null)
    {
        $transaction = $this->get_transaction_by_id($transaction_id);
        
        if (!$transaction || $transaction->payment_status !== 'pending') {
            return false;
        }

        $this->db->trans_start();

        // Update user's wallet balance
        $balance_after = $transaction->balance_before + $transaction->amount;
        
        $this->db->where('id', $transaction->user_id);
        $this->db->set('wallet_balance', 'wallet_balance + ' . (float)$transaction->amount, FALSE);
        $this->db->update('users');

        // Update transaction status
        $update_data = array(
            'balance_after' => $balance_after,
            'payment_status' => 'success',
            'description' => str_replace('(Pending)', '(Completed)', $transaction->description)
        );
        
        if ($payment_id) {
            $update_data['payment_id'] = $payment_id;
        }

        $this->db->where('id', $transaction_id);
        $this->db->update('wallet_transactions', $update_data);

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    /**
     * Fail a pending wallet top-up transaction
     */
    public function fail_topup($transaction_id, $reason = null)
    {
        $transaction = $this->get_transaction_by_id($transaction_id);
        
        if (!$transaction || $transaction->payment_status !== 'pending') {
            return false;
        }

        $update_data = array(
            'payment_status' => 'failed',
            'description' => str_replace('(Pending)', '(Failed' . ($reason ? ': ' . $reason : '') . ')', $transaction->description)
        );

        $this->db->where('id', $transaction_id);
        return $this->db->update('wallet_transactions', $update_data);
    }

    /**
     * Recalculate and fix wallet balance based on transaction history
     * This helps fix any balance discrepancies
     */
    public function recalculate_balance($user_id)
    {
        // Calculate total credits (successful and completed only, exclude pending/failed)
        $this->db->select_sum('amount');
        $this->db->where('user_id', $user_id);
        $this->db->where('transaction_type', 'credit');
        $this->db->where_in('payment_status', ['success', 'completed']);
        $credit_query = $this->db->get('wallet_transactions');
        $total_credited = (float)($credit_query->row()->amount ?: 0);

        // Calculate total debits (successful and completed only, exclude pending/failed)
        $this->db->select_sum('amount');
        $this->db->where('user_id', $user_id);
        $this->db->where('transaction_type', 'debit');
        $this->db->where_in('payment_status', ['success', 'completed']);
        $debit_query = $this->db->get('wallet_transactions');
        $total_debited = (float)($debit_query->row()->amount ?: 0);

        // Calculate correct balance
        $correct_balance = $total_credited - $total_debited;

        // Update user's wallet balance
        $this->db->where('id', $user_id);
        $this->db->update('users', array('wallet_balance' => $correct_balance));

        return $correct_balance;
    }
}
