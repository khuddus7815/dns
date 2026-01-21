<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifications_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Create a new notification
     */
    public function create_notification($data)
    {
        $notification_data = array(
            'user_id' => $data['user_id'],
            'order_id' => isset($data['order_id']) ? $data['order_id'] : null,
            'type' => $data['type'],
            'title' => $data['title'],
            'message' => $data['message'],
            'is_read' => 0,
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->db->insert('notifications', $notification_data);
        return $this->db->insert_id();
    }

    /**
     * Get unread notifications count for a user
     */
    public function get_unread_count($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('is_read', 0);
        return $this->db->count_all_results('notifications');
    }

    /**
     * Get recent notifications for a user (for dropdown)
     */
    public function get_recent_notifications($user_id, $limit = 5)
    {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('notifications');
        return $query->result();
    }

    /**
     * Get all notifications for a user (for notifications page)
     */
    public function get_all_notifications($user_id, $limit = 50, $offset = 0)
    {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('notifications');
        return $query->result();
    }

    /**
     * Mark notification as read
     */
    public function mark_as_read($notification_id, $user_id)
    {
        $this->db->where('id', $notification_id);
        $this->db->where('user_id', $user_id);
        $this->db->update('notifications', array('is_read' => 1));
        return $this->db->affected_rows() > 0;
    }

    /**
     * Mark all notifications as read for a user
     */
    public function mark_all_as_read($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('is_read', 0);
        $this->db->update('notifications', array('is_read' => 1));
        return $this->db->affected_rows();
    }

    /**
     * Get notification by ID
     */
    public function get_notification($notification_id, $user_id)
    {
        $this->db->where('id', $notification_id);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('notifications');
        return $query->row();
    }

    /**
     * ============================================
     * ADMIN NOTIFICATION METHODS
     * ============================================
     */

    /**
     * Create a new admin notification
     */
    public function create_admin_notification($data)
    {
        $notification_data = array(
            'order_id' => isset($data['order_id']) ? $data['order_id'] : null,
            'type' => $data['type'],
            'title' => $data['title'],
            'message' => $data['message'],
            'is_read' => 0,
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->db->insert('admin_notifications', $notification_data);
        return $this->db->insert_id();
    }

    /**
     * Get unread admin notifications count
     */
    public function get_admin_unread_count()
    {
        $this->db->where('is_read', 0);
        return $this->db->count_all_results('admin_notifications');
    }

    /**
     * Get recent admin notifications (for dropdown)
     */
    public function get_admin_recent_notifications($limit = 5)
    {
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('admin_notifications');
        return $query->result();
    }

    /**
     * Get all admin notifications (for notifications page)
     */
    public function get_all_admin_notifications($limit = 50, $offset = 0)
    {
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('admin_notifications');
        return $query->result();
    }

    /**
     * Mark admin notification as read
     */
    public function mark_admin_as_read($notification_id)
    {
        $this->db->where('id', $notification_id);
        $this->db->update('admin_notifications', array('is_read' => 1));
        return $this->db->affected_rows() > 0;
    }

    /**
     * Mark all admin notifications as read
     */
    public function mark_all_admin_as_read()
    {
        $this->db->where('is_read', 0);
        $this->db->update('admin_notifications', array('is_read' => 1));
        return $this->db->affected_rows();
    }
}
