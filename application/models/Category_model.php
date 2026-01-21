<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
    }

    public function add_category($data)
    {
        try {
            $table = 'category';
            $response = array("STATUS" => "false", "Message" => "Something went wrong please try again");
            $data = $this->db->insert($table, $data);
            if ($this->db->insert_id() > 0) {
                $last_insertedid = $this->db->insert_id();
                return $last_insertedid;
            }
        } catch (Exception $e) {
            $err_msg = $e->getMessage();
            $response['Message'] = $err_msg;
        }

        return $response;
    }

    public function get_category_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function update_category($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('category', $data);
    }

    public function update_subcategory($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('subcategory', $data);
    }

    // --- FULLY FIXED DELETE FUNCTION ---
    public function delete_category($id)
    {
        // Start a database transaction
        $this->db->trans_start();

        // 1. Delete Variants linked to this category
        // Variants often depend on Products/Subcategories, so they must go first.
        $this->db->where('category_id', $id);
        $this->db->delete('variants');

        // 2. Delete Occasion_Product links
        // We find all product IDs in this category first
        $this->db->select('id');
        $this->db->where('category_id', $id);
        $query = $this->db->get('product');
        
        if ($query->num_rows() > 0) {
            $product_ids = array();
            foreach ($query->result() as $row) {
                $product_ids[] = $row->id;
            }
            
            // Delete from occasion_product where product_id is in the list
            if (!empty($product_ids)) {
                $this->db->where_in('product_id', $product_ids);
                $this->db->delete('occasion_product');
            }
        }

        // 3. Delete Products
        $this->db->where('category_id', $id);
        $this->db->delete('product');

        // 4. Delete Subcategories
        $this->db->where('category_id', $id);
        $this->db->delete('subcategory');

        // 5. Finally, delete the Category
        $this->db->where('id', $id);
        $this->db->delete('category');

        // Complete the transaction
        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function get_allcategory()
    {
        $res = $this->db->query("SELECT * from category");
        return $res->result();
    }

    public function get_byOccasion($id)
    {
        $query = $this->db->query("SELECT * FROM product 
                                   INNER JOIN occasion_product 
                                   ON product.id = occasion_product.product_id 
                                   WHERE occasion_product.occasion_id = $id");
        return $query->result();
    }

    public function get_byCategory($category_id)
    {
        $query = $this->db->query("SELECT * FROM product WHERE category_id = ?", array($category_id));
        return $query->result();
    }

    public function get_byCategoryName($category_name)
    {
        $query = $this->db->query("SELECT p.* FROM product p INNER JOIN category c ON p.category_id = c.id WHERE c.category_name = ?", array($category_name));
        return $query->result();
    }

    public function get_productcategoryid($id)
    {
        $this->db->select('category_id');
        $this->db->where('id', $id);
        $query = $this->db->get('product');
        $result = $query->row();
        if ($result) {
            return $result->category_id;
        } else {
            return null;
        }
    }
}