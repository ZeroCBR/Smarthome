<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class account extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->library('session');
                        $this->load->model('account_model');
		}
		
		function index(){
                        $this->load->view('account/index');
			$this->load->view('account/login_form');
		}
		
		function usr_info(){
			$this->load->view('share/_login_nav');			
		}		

		function login(){
			if($this->account_model->login($_POST)){
				redirect("account/usr_info","refresh");
			}
			else
				echo "Failed";
		}

		function logout(){
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('uid');
			redirect("home/","refresh");
		}

		function register(){
			if($this->account_model->register($_POST)){
				echo "Register Sucessfully";
				redirect("account/","refresh");
			}
		}

	}
?>
