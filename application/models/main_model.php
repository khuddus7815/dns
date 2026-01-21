<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

	function __construct() {
        parent::__construct();
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    public function submit($data)
	{
		// print_r($data);
		if(isset($data['submit'])){
			extract($_POST);
			// $this->form_validation->set_rules('fullname','Username','required');
            // $this->form_validation->set_rules('email','Email','required');
            // $this->form_validation->set_rules('phone','Phone','required|min_length[10]');


			// if($this->form_validation->run() == TRUE){
			// 	echo "form validated!!";

				$data = array(
					'fullname'=>$_POST['fullname'],
					'email'=>$_POST['email'],
					'phone'=>$_POST['phone'],

				);
				

				$checkem = $this->db->query("select * from users where email='$email'");
				$checkph = $this->db->query("select * from users where phone='$phone'");

				if($checkem->num_rows() > 0){
					return 2;
				}
				if($checkph->num_rows() > 0){
					return 3;
				}

				$this->db->insert('users',$data);

				$dbid=$this->db->insert_id();
				$uid=uniqid();
				$login_data = array(
					'user_id'=>$dbid,
					'user_type'=>'1',
					'phone'=>$_POST['phone'],
					'password'=>$uid,

				);
				if($dbid!=''){
					$this->db->insert('login',$login_data);

					return 1;
					
				}
				else{
					return 0;
				}
				
				
			
		}
		// $this->d->fun_name_in_model();
		//$this->load->view('register');

	}

    public function can_login($phone,$password)  
    {  

		$data=array(
			'phone'=>$phone,
			'password'=>$password);
		$this->db->select('*');
        $this->db->where($data);
		$query = $this->db->get('login');
		extract($query->result_array());
		

		if($query->num_rows()>0){
            $this->session->set_userdata($data);
		    // $session_data = $this->session->userdata('user_id');
			return 1;
		}
		else{
			return 0;
		}
		

		


    }  


}