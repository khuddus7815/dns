<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Create a new invoice for an order
     */
    public function create_invoice($order_id, $user_id, $subtotal, $total_amount, $delivery_charge = 0, $discount_amount = 0)
    {
        // Generate unique invoice number
        $invoice_number = 'INV-' . date('Ymd') . '-' . strtoupper(uniqid());
        
        $data = array(
            'invoice_number' => $invoice_number,
            'order_id' => $order_id,
            'user_id' => $user_id,
            'invoice_date' => date('Y-m-d H:i:s'),
            'subtotal' => $subtotal,
            'delivery_charge' => $delivery_charge,
            'discount_amount' => $discount_amount,
            'total_amount' => $total_amount,
            'status' => 'active'
        );
        
        $this->db->insert('invoices', $data);
        return $this->db->insert_id();
    }

    /**
     * Get invoice by order ID
     */
    public function get_invoice_by_order_id($order_id)
    {
        $this->db->where('order_id', $order_id);
        $query = $this->db->get('invoices');
        return $query->row();
    }

    /**
     * Get invoice by invoice ID
     */
    public function get_invoice_by_id($invoice_id)
    {
        $this->db->where('id', $invoice_id);
        $query = $this->db->get('invoices');
        return $query->row();
    }

    /**
     * Get invoice by invoice number
     */
    public function get_invoice_by_number($invoice_number)
    {
        $this->db->where('invoice_number', $invoice_number);
        $query = $this->db->get('invoices');
        return $query->row();
    }

    /**
     * Get all invoices with order and user details
     */
    public function get_all_invoices()
    {
        $this->db->select('invoices.*, orders.order_number, orders.payment_mode, orders.status as order_status, users.username, users.email, users.mobile');
        $this->db->from('invoices');
        $this->db->join('orders', 'invoices.order_id = orders.id', 'left');
        $this->db->join('users', 'invoices.user_id = users.id', 'left');
        $this->db->order_by('invoices.id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Get invoices by user ID
     */
    public function get_invoices_by_user_id($user_id)
    {
        $this->db->select('invoices.*, orders.order_number, orders.payment_mode');
        $this->db->from('invoices');
        $this->db->join('orders', 'invoices.order_id = orders.id', 'left');
        $this->db->where('invoices.user_id', $user_id);
        $this->db->order_by('invoices.id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Check if invoice exists for order
     */
    public function invoice_exists_for_order($order_id)
    {
        $this->db->where('order_id', $order_id);
        $query = $this->db->get('invoices');
        return $query->num_rows() > 0;
    }
}
