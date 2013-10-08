<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class account extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->library('session');
                        $this->load->model('account_model');
                       // $this->output->enable_profiler(TRUE);
		}
		
		function index(){
                        $this->load->view('account/index');
		}

		function login(){
			if($this->account_model->login($_POST)){
				echo "Sign in sucessfully";
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
