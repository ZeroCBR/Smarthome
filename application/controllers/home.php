<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class home extends CI_Controller{
		function __construct(){
			parent::__construct();
		}
		
		function index(){
			$data['title'] = 'Home';
			$this->load->view('index', $data);
		}
		
		function register_page(){
 		 	$data['addr'] = "account/register";
                        $data['title'] = "Register";
                        $this->load->view('index', $data);

		}
		
		function about(){
			$this->load->view('public/about');
		}
	
	}

?>
