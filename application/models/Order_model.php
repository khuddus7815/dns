<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function create_order($data)
    {
        //print_r($data);exit;   
        $count = $this->db->count_all("orders");
        $generate_orderid = "orderid-" . ($count + 1);
        $user_id = $data['user_id'];
        $address_id = $data['address_details'];
        $add_details = $this->db->query("SELECT * FROM useraddress where id='$address_id' AND user_id='$user_id'")->row();
        //print_r($add_details);exit;
        $orderid = [
            'order_number' => $generate_orderid,
            'address_details' => 'Name:- ' . $add_details->name . ', ' . ' Address:- ' . $add_details->address . ', ' . ' City:- ' . $add_details->city . ', ' . ' Pincode:- ' . $add_details->pincode . ' ,' . ' Phone number :-' . $add_details->phonenumber
        ];
        //print_r(array_merge($data,$orderid));exit;
        $final_orderdetails = array_merge($data, $orderid);
        $this->db->insert('orders', $final_orderdetails);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            $this->db->query("DELETE FROM cart where user_id='$user_id'");
            $this->db->where('user_id', $user_id);
            $this->db->delete('addon_cart');
            $get_placedorder_details = $this->db->query("SELECT * from orders where id='$insert_id' AND user_id='$user_id'");
            //print_r(($this->db->affected_rows() != 1) ? false : true);exit;
            return $get_placedorder_details->row_array();
        } else {
            return false;
        }

    }

    public function get_orderdetails($user_id)
    {
        $res = $this->db->query("SELECT * FROM orders WHERE user_id='$user_id'");
        if (count($res->result()) > 0) {
            return $res->result();
        } else {
            return false;
        }
    }

    public function get_orderdetailsby_orderid($id, $user_id)
    {
        $res = $this->db->query("SELECT * FROM orders WHERE id='$id' AND user_id='$user_id' ");
        if ($res->num_rows() > 0) {
            // print_r($res->row());
            // exit;
            return $res->row();
        } else {
            return false;
        }

    }

    public function get_selected_orderdetail($order_id)
    {
        $res = $this->db->query("SELECT * from orders as o inner join order_product as p on o.id=p.order_id where o.id='$order_id'");
        if ($res->num_rows() > 0) {
            // echo "<pre>";
            // print_r($res->row());
            // exit;
            return $res->row();
        } else {
            return false;
        }

    }

    public function get_orderproductsby_orderid($id)
    {
        // FIX: Added 'p.selling_price' and 'p.price' (original price) to the select statement
        // Note: Using product_img1 as the image column (product_image doesn't exist in product table)
        $this->db->select('op.*, p.product_name, p.product_img1 as product_image, p.selling_price, p.price as original_product_price');
        $this->db->from('order_product op'); // Your table is singular
        $this->db->join('product p', 'op.product_id = p.id', 'left');
        $this->db->where('op.order_id', $id);
        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            return $res->result();
        } else {
            return array();
        }
    }
    public function get_orderlist()
    {
        // Step 1: Get all orders with customer username
        // MODIFIED: Fixed $this.db to $this->db
        $this->db->select('orders.*, users.username');
        $this->db->from('orders');
        $this->db->join('users', 'orders.user_id = users.id');
        $this->db->order_by('orders.id', 'DESC');
        $query = $this->db->get();
        $orders = $query->result();

        // Step 2: Loop through each order and get its products
        foreach ($orders as $order) {
            $this->db->select('op.*, p.product_img1 as product_image'); // Get product image
            $this->db->from('order_product op');
            $this->db->join('product p', 'op.product_id = p.id', 'left');
            $this->db->where('op.order_id', $order->id);
            $product_query = $this->db->get();
            $order->order_product = $product_query->result(); // Attach products to the order object
        }

        return $orders;
    }

    public function get_orderlistByUserId($user_id)
    {
        // Select all order fields including delivery_charge, discount_amount, coupon_code
        $this->db->select('orders.*, users.username');
        $this->db->from('orders');
        $this->db->join('users', 'orders.user_id = users.id');
        $this->db->where('orders.user_id', $user_id);
        $this->db->order_by('orders.id', 'DESC');
        $query = $this->db->get();
        $orders = $query->result();

        foreach ($orders as $order) {
            // Get order products with product details
            $this->db->select('op.*, p.product_img1 as product_image, p.price as original_product_price, p.selling_price as original_product_selling_price');
            $this->db->from('order_product op');
            $this->db->join('product p', 'op.product_id = p.id', 'left');
            $this->db->where('op.order_id', $order->id);
            $product_query = $this->db->get();
            $order->order_product = $product_query->result();
        }

        return $orders;
    }
    public function get_latest_orders()
    {
        $this->db->select('orders.*, users.username, users_detail.first_name, users_detail.last_name');
        $this->db->from('orders');
        $this->db->join('users', 'orders.user_id = users.id', 'left');
        $this->db->join('users_detail', 'users.id = users_detail.user_id', 'left');

        $this->db->order_by('orders.created_at', 'DESC');
        $this->db->limit(5);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_orderlistByOrderid($id)
    {
        $res = $this->db->query("SELECT * FROM orders WHERE id='$id'");
        //print_r($res->num_rows());exit;
        if ($res->num_rows() > 0) {
            // print_r($res->row());exit;
            return $res->row();
        } else {
            return false;
        }
    }

    public function get_user_order_details($user_id)
    {
        $res = $this->db->query("SELECT * from orders as o inner join order_product as p on o.id=p.order_id where o.user_id='$user_id'");
        //  print_r($res->num_rows());exit;
        if ($res->num_rows() > 0) {
            // echo "<pre>";
            // print_r($res->result());exit;
            return $res->result();
        } else {
            return false;
        }
    }

    public function get_ordersbyAddressId($id)
    {
        $res = $this->db->query("SELECT * FROM orders WHERE address_id='$id'");
        //print_r($res->num_rows());exit;
        if ($res->num_rows() > 0) {
            // print_r($res->row());exit;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Gets all orders for a specific user ID
     */
    public function get_orders_by_user_id($user_id)
    {
        $this->db->where('user_id', $user_id);

        $this->db->order_by('created_at', 'DESC');

        $query = $this->db->get('orders');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }


    /**
     * Gets a single address by its ID from the useraddress table
     */
    public function get_address_by_id($address_id)
    {
        // UPDATED table name to users_address
        $query = $this->db->get_where('users_address', array('id' => $address_id));
        return $query->row();
    }
    /**
     * Gets total sales grouped by date for a sales chart.
     */
    public function get_sales_over_time()
    {
        $this->db->select("DATE(created_at) as date, SUM(tot_amount) as total");
        $this->db->from('orders');
        $this->db->group_by('DATE(created_at)');
        $this->db->order_by('date', 'ASC');
        $this->db->limit(30); // Get last 30 days of sales
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Gets top selling products for a pie chart.
     */
    public function get_top_selling_products()
    {
        $this->db->select('p.product_name, SUM(op.quantity) as total_sold');
        $this->db->from('order_product op'); // Use singular as we fixed before
        $this->db->join('product p', 'op.product_id = p.id', 'left');
        $this->db->group_by('p.product_name');
        $this->db->order_by('total_sold', 'DESC');
        $this->db->limit(5); // Get top 5 products
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Calculates total earnings for the current month (only delivered orders).
     */
    public function get_monthly_earnings()
    {
        $this->db->select_sum('tot_amount');
        $this->db->from('orders');
        $this->db->where('MONTH(created_at)', date('m'));
        $this->db->where('YEAR(created_at)', date('Y'));
        $this->db->where('status', 4);
        $query = $this->db->get();

        $result = $query->row();
        return $result->tot_amount ? $result->tot_amount : 0;
    }
    /**
     * Updates the status column for a specific order
     */
    public function update_status($order_id, $status, $cancelled_by = null)
    {
        $update_data = ['status' => $status];
        if ($cancelled_by !== null) {
            $update_data['cancelled_by'] = $cancelled_by;
        }
        $this->db->where('id', $order_id);
        return $this->db->update('orders', $update_data);
    }

    // Add this new function to Order_model.php
    public function get_orders_by_user($user_id)
    {
        // Select all columns from 'orders' (o.*) and the product details from 'order_product' (op)
        // Note: order_product table uses 'price' column, not 'selling_price'
        $this->db->select('o.*, op.product_name, op.product_image, op.quantity, op.price, op.variant_weight');
        $this->db->from('orders o');

        // Join orders to order_product using the corrected keys
        $this->db->join('order_product op', 'op.order_id = o.id', 'left');

        // Filter and Order
        $this->db->where('o.user_id', $user_id);
        $this->db->order_by('o.id', 'DESC');

        $query = $this->db->get();

        // We will group the results in PHP later since one order can have multiple products.
        // For now, returning the raw result set.
        return $query->result();
    }
    // Chart Data Methods
    public function get_weekly_sales_chart()
    {
        // Get last 7 days sales
        // Simulating profit as 20% of total sales
        $query = $this->db->query("
            SELECT DATE(created_at) as date, SUM(tot_amount) as total, (SUM(tot_amount) * 0.20) as profit 
            FROM orders 
            WHERE status = 4 
            AND created_at >= DATE(NOW()) - INTERVAL 7 DAY
            GROUP BY DATE(created_at) 
            ORDER BY date ASC
        ");
        return $query->result();
    }

    public function get_monthly_sales_chart()
    {
        // Get last 12 months sales
        $query = $this->db->query("
            SELECT DATE_FORMAT(created_at, '%Y-%m') as month_year, SUM(tot_amount) as total 
            FROM orders 
            WHERE status = 4 
            AND created_at >= DATE(NOW()) - INTERVAL 12 MONTH
            GROUP BY month_year 
            ORDER BY month_year ASC
        ");
        return $query->result();
    }

    public function get_orders_by_status_chart()
    {
        // Get order counts by status
        // Status mapping: 0=Placed, 1=Confirmed, 2=Shipped, 3=Out for Delivery, 4=Delivered, 5=Cancelled
        $query = $this->db->query("
            SELECT status, COUNT(*) as count 
            FROM orders 
            GROUP BY status
        ");
        return $query->result();
    }
}

