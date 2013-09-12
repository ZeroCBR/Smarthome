<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class home extends CI_Controller{
		function __construct(){
			parent::__construct();
		}
		
		function index(){
			$data['title'] = 'Home';
			$this->load->view('index', $data);
		}
		
		function login_page(){
			$data['addr'] = "account/login";
 			$data['title'] = "Sign In";
			$this->load->view('index', $data);
		}
	
	}

?>
