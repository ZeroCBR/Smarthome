<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class account extends CI_Controller{

		private $gra_summary="";
		
		function __construct(){
			parent::__construct();
			$this->load->library('session');
	                $this->load->model('account_model');
			$this->load->model('tag_model');
		}
		
		function index(){
            		$this->load->view('account/index');
			$this->load->view('account/login_form');
		}
		
		function login($user=NULL){
			if(isset($user)){
				$user_info =array('email'=>$user['email'],'password'=>$user['password']);
				$this->account_model->login($user_info);
				$default_tag = array("tag_name"=>"favourite","intro"=>"This is default tag for managing your Electric Appliance");
				$this->tag_model->add_tag($default_tag);
				redirect("machine/statistics","refresh");
			}
			else{
				$user_info =array('email'=>$_POST['email'],'password'=>$_POST['password']);
				if($this->account_model->login($user_info)){
					redirect("machine/statistics","refresh");
				}
				else
					echo "Failed";
			}
		}

		function logout(){
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('uid');
			redirect("home/","refresh");
		}

		function register(){
			if($this->account_model->register($_POST)){
				$this->login($_POST);
			}
		}

	}
?>
