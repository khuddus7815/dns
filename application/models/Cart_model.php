<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function addToCart($user_id, $product_id, $quantity, $price, $namecake = null, $variant_id = null, $v_weight = null)
    {
        $is_variant = 0;
        if ($variant_id) {
            $is_variant = 1;
        }
        $data = array(
            'user_id' => $user_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'price' => $price,
            'is_variant' => $is_variant,
            'variant_id' => $variant_id,
            'unit' => $v_weight,
        );

        // Check if namecake is provided
        if (!is_null($namecake) && !empty($namecake)) {
            $data['namecake'] = $namecake;
        }

        // Insert into cart
        if (!$this->db->insert('cart', $data)) {
            // Log database error
            log_message('error', 'Cart insert failed: ' . $this->db->error()['message']);
            throw new Exception('Failed to add product to cart');
        }
    }


    public function addonToCart($user_id, $parent_id, $addon_id, $price)
    {
        $data = array(
            'user_id' => $user_id,
            'parent_id' => $parent_id,
            'addon_id' => $addon_id,
            'quantity' => 1,
            'price' => $price
        );
        $this->db->insert('addon_cart', $data);
    }

    public function updateCartItem($cart_item_id, $quantity)
    {
        $data = array('quantity' => $quantity);
        $this->db->where('id', $cart_item_id);
        $this->db->update('cart', $data);
    }

    public function getCartItem($user_id, $product_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('cart');
        return $query->row();
    }

    public function getCartItemsByUserId($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('cart');
        return $query->result();
    }

    public function isProductInCart($userId, $productId)
    {
        $this->db->where('user_id', $userId);
        $this->db->where('product_id', $productId);
        $query = $this->db->get('cart');

        return $query->num_rows() > 0;
    }

    public function get_cart_by_user_id($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('cart');

        // Check if there are any items in the cart for the user
        if ($query->num_rows() > 0) {
            // Initialize an array to store cart items
            $cart_items = array();

            // Fetch cart items
            foreach ($query->result() as $row) {
                // Assuming you have a Product_model to fetch product details
                $product = $this->Product_model->get_byId($row->product_id); // Adjust method name as per your Product_model

                // Add cart item to the array
                $cart_items[] = array(
                    'product' => $product,
                    'quantity' => $row->quantity,
                    // Add more details if needed
                );
            }

            return $cart_items;
        } else {
            // If no items found in the cart, return empty array
            return array();
        }
    }

    public function get_allcart($user_id)
    {
        // FIX 1: Added all selected columns to the GROUP BY clause to satisfy SQL Strict Mode
        $sql = "SELECT combined_data.user_id, combined_data.product_id, 
                   SUM(combined_data.quantity) as quantity, SUM(combined_data.price) as cart_price,
                   product.id AS id, product.product_name, product.price, 
                   product.selling_price, product.description, product.product_img1
            FROM (
                SELECT cart.user_id, cart.product_id, cart.quantity, cart.price
                FROM cart
                WHERE cart.user_id = ?

                UNION ALL

                SELECT addon_cart.user_id, addon_cart.addon_id AS product_id, addon_cart.quantity, addon_cart.price 
                FROM addon_cart
                WHERE addon_cart.user_id = ?
            ) AS combined_data
            LEFT JOIN product ON product.id = combined_data.product_id
            GROUP BY combined_data.user_id, combined_data.product_id, 
                     product.id, product.product_name, product.price, 
                     product.selling_price, product.description, product.product_img1";

        $query = $this->db->query($sql, array($user_id, $user_id));
        $result = $query->result();

        foreach ($result as $key => $value) {
            // FIX 2: Check user_id when fetching variant details
            $cart_info = $this->db->query("select * from cart where product_id = ? AND user_id = ?", [$value->product_id, $user_id])->row();

            $varient_name = null;
            if (!empty($cart_info)) {
                if ($cart_info->is_variant) {
                    $v_info = $this->db->query("select * from variants where id = ?", [$cart_info->variant_id])->row();
                    $varient_name = isset($v_info->variant_name) ? $v_info->variant_name : null;
                }
            }

            $result[$key]->unit = isset($cart_info->unit) ? $cart_info->unit : null;
            $result[$key]->is_variant = isset($cart_info->is_variant) ? $cart_info->is_variant : 0;
            $result[$key]->namecake = isset($cart_info->namecake) ? $cart_info->namecake : null;

            // CRITICAL FIX: Use database prices (product or variant) as source of truth
            // This ensures price accuracy and prevents price manipulation
            $db_selling_price = 0;

            if (!empty($cart_info)) {
                if ($cart_info->is_variant && !empty($v_info)) {
                    // Use variant price if it's a variant
                    $db_selling_price = (float) $v_info->variant_sellingprice;
                    if ($db_selling_price <= 0) {
                        $db_selling_price = (float) $v_info->variant_price;
                    }
                }
            }

            // Fallback to product price if no variant price or not a variant
            if ($db_selling_price <= 0) {
                if (!empty($value->selling_price) && $value->selling_price > 0) {
                    $db_selling_price = (float) $value->selling_price;
                } else {
                    $db_selling_price = !empty($value->price) ? (float) $value->price : 0;
                }
            }

            $result[$key]->cart_selling_price = $db_selling_price;

            $result[$key]->varient_name = $varient_name;
        }
        return $result;
    }
    public function delete_cartItem($id)
    {


        // Check if the product exists in the cart table
        $this->db->where('product_id', $id);
        $query = $this->db->get('cart');

        // If the product exists in the cart table, delete it
        if ($query->num_rows() > 0) {
            $this->db->where('product_id', $id);
            $this->db->delete('cart');

            // Set success flash message
            $this->session->set_flashdata('success', 'Product deleted successfully.');
        } else {
            // If the product doesn't exist in the cart table, check the addon_cart table
            $this->db->where('addon_id', $id);
            $query = $this->db->get('addon_cart');

            // If the product exists in the addon_cart table, delete it
            if ($query->num_rows() > 0) {
                $this->db->where('addon_id', $id);
                $this->db->delete('addon_cart');

                // Set success flash message
                $this->session->set_flashdata('success', 'Product deleted successfully.');
            } else {
                // If the product doesn't exist in either table, set error flash message
                $this->session->set_flashdata('error', 'Product does not exist.');
            }
        }
        redirect('cart');
    }

    public function update_CartQuantity($id, $newQuantity, $user_id)
    {
        try {
            // Validate quantity
            $newQuantity = (int) $newQuantity;
            if ($newQuantity < 1) {
                $newQuantity = 1; // Minimum quantity is 1
            }

            // Check if the item exists in the cart table for this user
            $this->db->where('product_id', $id);
            $this->db->where('user_id', $user_id);
            $cartQuery = $this->db->get('cart');
            $cartItem = $cartQuery->row();

            if ($cartItem) {
                // CRITICAL: Get the current unit price from product table to ensure accuracy
                $this->load->model('Product_model');
                $product = $this->Product_model->get_byId($id);

                $data = array('quantity' => $newQuantity);
                if ($product && isset($product->selling_price) && $product->selling_price > 0) {
                    $data['price'] = $product->selling_price; // Ensure price is always correct unit price
                }

                $this->db->where('product_id', $id);
                $this->db->where('user_id', $user_id);
                $this->db->update('cart', $data);
                return true; // Successfully updated
            }

            // Check if the item exists in the addon_cart table
            $this->db->where('addon_id', $id);
            $this->db->where('user_id', $user_id);
            $addonCartQuery = $this->db->get('addon_cart');
            $addonCartItem = $addonCartQuery->row();

            if ($addonCartItem) {
                // For addon items, just update quantity (price should be fixed)
                $this->db->where('addon_id', $id);
                $this->db->where('user_id', $user_id);
                $this->db->update('addon_cart', array('quantity' => $newQuantity));
                return true; // Successfully updated
            }

            // If the item doesn't exist in either table
            return false; // Item not found
        } catch (Exception $e) {
            // Handle any database errors here
            log_message('error', 'Error updating cart quantity: ' . $e->getMessage());
            return false; // Error occurred
        }
    }

    public function cartCount($user_id)
    {

        $cartCount = $this->db->where('user_id', $user_id)->count_all_results('cart');

        // Get count from the addon_cart table
        $addonCartCount = $this->db->where('user_id', $user_id)->count_all_results('addon_cart');

        // Total count
        $totalCount = $cartCount + $addonCartCount;

        return $totalCount;
    }
}
