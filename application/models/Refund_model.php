<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Refund_model extends CI_Model
{
    /**
     * Get all refund requests (cancelled orders)
     * @return array List of cancelled orders eligible for refund
     */
    public function get_all_refund_requests()
    {
        $this->db->select('
            orders.*, 
            users.username, 
            users.email,
            users.mobile
        ');
        $this->db->from('orders');
        $this->db->join('users', 'orders.user_id = users.id', 'left');
        $this->db->where('orders.status', '0'); // Status 0 = Cancelled
        $this->db->order_by('orders.updated_at', 'DESC');
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $orders = $query->result();
            
            // Get products for each order
            foreach ($orders as $order) {
                $this->db->select('op.*, p.product_name, p.product_img1');
                $this->db->from('order_product op');
                $this->db->join('product p', 'op.product_id = p.id', 'left');
                $this->db->where('op.order_id', $order->id);
                $product_query = $this->db->get();
                $order->order_products = $product_query->result();
            }
            
            return $orders;
        }
        
        return array();
    }

    /**
     * Get refund request by order ID
     */
    public function get_refund_by_order_id($order_id)
    {
        $this->db->select('
            orders.*, 
            users.username, 
            users.email,
            users.mobile,
            users.wallet_balance
        ');
        $this->db->from('orders');
        $this->db->join('users', 'orders.user_id = users.id', 'left');
        $this->db->where('orders.id', $order_id);
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $order = $query->row();
            
            // Get products for this order
            $this->db->select('op.*, p.product_name, p.product_img1');
            $this->db->from('order_product op');
            $this->db->join('product p', 'op.product_id = p.id', 'left');
            $this->db->where('op.order_id', $order->id);
            $product_query = $this->db->get();
            $order->order_products = $product_query->result();
            
            return $order;
        }
        
        return null;
    }

    /**
     * Process refund - Credit amount to user's wallet
     * @param int $order_id Order ID
     * @param int $user_id User ID
     * @param float $refund_amount Amount to refund
     * @param string $refund_reason Reason for refund
     * @return bool Success status
     */
    public function process_refund($order_id, $user_id, $refund_amount, $refund_reason = 'Order Cancellation')
    {
        if ($refund_amount <= 0) {
            return false;
        }

        $this->db->trans_start();

        try {
            // Load Wallet model
            $this->load->model('Wallet_model');
            
            // Get order details
            $order = $this->db->get_where('orders', ['id' => $order_id])->row();
            
            if (!$order) {
                throw new Exception("Order not found");
            }

            // Credit wallet
            $wallet_credited = $this->Wallet_model->add_balance(
                $user_id,
                $refund_amount,
                'refund',
                $order->payment_mode,
                null,
                $order_id,
                'Refund for cancelled order #' . $order->order_number
            );

            if (!$wallet_credited) {
                throw new Exception("Failed to credit wallet");
            }

            // Update order with refund details
            $update_data = array(
                'refund_status' => 'completed',
                'refund_amount' => $refund_amount,
                'refund_date' => date('Y-m-d H:i:s'),
                'refund_reason' => $refund_reason
            );
            
            $this->db->where('id', $order_id);
            $this->db->update('orders', $update_data);

            // Create notification
            $this->load->model('Notifications_model');
            $this->Notifications_model->create_notification([
                'user_id' => $user_id,
                'order_id' => $order_id,
                'type' => 'refund_processed',
                'title' => 'Refund Processed',
                'message' => '₹' . number_format($refund_amount, 2) . ' has been credited to your wallet for cancelled order #' . $order->order_number
            ]);

            $this->db->trans_complete();

            return $this->db->trans_status();

        } catch (Exception $e) {
            $this->db->trans_rollback();
            log_message('error', 'Refund Processing Error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get refund statistics
     */
    public function get_refund_stats()
    {
        // Total pending refunds (Cancelled orders without completed refund)
        $this->db->where('status', '0'); // Cancelled
        $this->db->where('(refund_status IS NULL OR refund_status != "completed")');
        $pending_count = $this->db->count_all_results('orders');

        // Total completed refunds
        $this->db->where('refund_status', 'completed');
        $completed_count = $this->db->count_all_results('orders');

        // Total refunded amount
        $this->db->select_sum('refund_amount');
        $this->db->where('refund_status', 'completed');
        $query = $this->db->get('orders');
        $total_refunded = $query->row()->refund_amount ?: 0;

        return array(
            'pending_count' => $pending_count,
            'completed_count' => $completed_count,
            'total_refunded' => (float)$total_refunded
        );
    }
}
