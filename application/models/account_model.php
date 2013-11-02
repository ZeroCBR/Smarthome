<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class account_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		
		function register($info){
			if(!$this -> check_account($info['email']) ){
				$user['username'] = $info['username'];
				$user['email'] = $info['email'];
				$user['salt'] = $this -> getSalt();
				$user['hashed_password'] = md5(md5($info['password']).$user['salt']);
				$this->db->insert("users",$user);
				return true;
			}
			return false;
		}

		function login($user){
			if($this->check_account($user['email'])){
				$query = $this->db->get_where('users', array('email'=>$user['email'] )) -> result();
				$password =md5( md5($user['password']).$query[0]->salt );
				if($password === $query[0]->hashed_password ){
					$this->session-> set_userdata(array("email"=>$query[0]->email,"username" => $query[0]->username,
									    "uid" => $query[0]->id));
					return true;
				}		
			}
			return false;
		}
		
		function check_account($email){
			$this->db->select('email');
			$query = $this->db->get_where("users",array('email' => $email) );
			if(!sizeof($query -> result())){
				return false;
			}
			return true;
		}

		function getSalt(){
                        $allow_charts = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                        $salt_len = 18;
                        $chart_len = 62;
                        $salt = "";
                        for($i = 0; $i < $salt_len; $i++){
                                $salt .= $allow_charts[mt_rand(0,$chart_len-1)];
                        }
                        return $salt;
                }
		
	}
?>
