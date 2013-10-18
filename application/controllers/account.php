<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class account extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->library('session');
                     $this->load->model('account_model');
			$this->load->model('machine_model');
		}
		
		function index(){
                        $this->load->view('account/index');
		}

		function login(){
			if($this->account_model->login($_POST)){
				$machine_list=$this->machine_model->machineList($_POST['email']);
				$data = array("machine_list" => $machine_list);
				$this->load->view("machine/index",$data);
			}
			else
				echo "Failed";
		}

		function register(){
			if($this->account_model->register($_POST)){
				echo "Register Sucessfully";
			}
		}

	}
?>
