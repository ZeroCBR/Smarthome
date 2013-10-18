<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	*  这个是控制machine的model，第一个function是constructor, 初始化请往里面加。CBR请在这里添加提取
	*  machine的列表的函数,TM请在这里添加获取某个machine的信息的函数。
	*  注意，不要直接在view里面调用这里面的方法，请在controller里面调用这里的方法。
	**/
	class machine_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
		}

		function machineList($email){
			$query = $this->db->get_where('users', array('email'=>$email )) -> result();
			//echo var_dump($query[0]->id);
			$machine_list=$this->db->get_where('machines', array('user_id'=>$query[0]->id )) -> result();
			//echo var_dump($machine_list);
			return $machine_list;
		}
				
	}


?>
