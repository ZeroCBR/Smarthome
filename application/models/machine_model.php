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

		function list_machine($tag_id){
			$machine_list=$this->db->get_where('machines', array('user_id'=>$this->session->
			userdata('uid'), 'tag_id'=>$tag_id)) -> result();
			return $machine_list;
		}	
	
		function add_machine($machine_inf){
			if(isset($machine_inf)){
				$machine['name'] = $machine_inf['machine_name'];
				$machine['annotation'] = $machine_inf['annotation'];
				$machine['user_id'] = $this->session->userdata("uid");
				$machine['created_time'] = date("Y-m-d H:i:s",strtotime('now'));
				$machine['tag_id'] = $machine_inf['tag_id'];
				$this->db->insert("machines",$machine);
				return true;
			}
			return false;
		}

		function check_machine($name){
			$this->db->select("name,user_id");
			$query = $this->db->get_where("machines",array('name'=>$name,'user_id'=>$this->session->userdata['uid']));
			if(!sizeof($query->result())){
				return false;
			}
			return true;
		}
		
		function delete_machine($mid){
			if($this->get_machine($mid)){
				$this->db->delete('machines',array('id'=>$mid,'user_id'=>$this->session->userdata('uid')));
				return true;
			}
			return false;
		}
		
		function edit_machine($mid,$machine){
			if($this->get_machine($mid)){
				$this->db->where("id",$mid);
				$this->db->update('machines',$machine);
				return true;
			}
			return false;
		}

		function get_machine($id){
			$this->db->select("id,name,user_id,annotation");
			$query = $this->db->get_where("machines",array('id'=>$id,'user_id'=>$this->session->userdata('uid')))->result();
			if(sizeof($query)){
				return $query[0];
			}
			return false;
		}
		
		function get_statistics(){
			if($this->session->userdata('uid')){
				$result;
				$this->db->select('id,name,user_id');
				$query = $this->db->get_where("machines",array('user_id'=>$this->session->userdata('uid')))->result();
				foreach($query as $machine_info){
					$tasks = $this->db->get_where("tasks",array('machine_id'=>$machine_info->id))->result();
					$count = count($tasks);
					$result[$machine_info->name] = $count;
				}
				return $result;
			}
		}
				
	}


?>
