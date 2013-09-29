<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class account extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->library('session');
                        $this->load->model('account_model');
                        $this->output->enable_profiler(TRUE);
		}

		function login(){
			if($this->account_model->login($_POST)){
				echo "Sign in sucessfully";
				//$this->sendmessage();
			}
			else
				echo "Failed";
		}

		function register(){
			if($this->account_model->register($_POST)){
				echo "Register Sucessfully";
			}
		}

/*		private function sendmessage(){
			$message_queue_key = ftok('/home/john/temp/key','a');

			$message_queue = msg_get_queue($message_queue_key, 0666);
			var_dump($message_queue);

			//向消息队列中写
			msg_send($message_queue, 1, "Log in\n");

			$message_queue_status = msg_stat_queue($message_queue);
			print_r($message_queue_status);

			
		}
*/
	}
?>
