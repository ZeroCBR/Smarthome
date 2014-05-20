<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class task_model extends CI_Model{
/**
*   YM 请在这里添加model函数，包括提取task 的list， 添加task等。
*
**/
		function __construct(){
			parent::__construct();
		}

		function list_task($machine_id){
			$task_list = $this->db->get_where("tasks",array('machine_id'=>$machine_id)) ->result();
			return $task_list;
		}

		function add_task($task_inf,$id){
			if(isset($task_inf)){
				$task['title'] = $task_inf['title'];
				$task['annotation'] = $task_inf['annotation'];
				$task['params'] = $task_inf['params'];
				$task['machine_id'] = $id;
				$task['deadline'] = $task_inf['time'];
				$this->db->insert("tasks",$task);
				$result = $this->db->get_where("tasks",array('machine_id'=>$id,'deadline'=>$task_inf['time']))->result();
				$task['id']=$result[0]->id;
				if($this->session->userdata('uid')){
					$task += array('uid'=>$this->session->userdata('uid'));
					$mess = packing($task);
					ipc_send($mess);
				}
				return true;
			}
			return false;
		}

		function delete_task($task_id){
			if(isset($task_id)){
				$this->db->delete("tasks",array('id'=>$task_id));
				return true;
			}
			return false;
		}

		function get_mid($task_id){
			$result = $this->db->get_where("tasks",array('id'=>$task_id))->result();
			if(sizeof($result)){
				return $result[0];
			}
			return false;
		}
		

		function edit_task($task_id,$task){
			if($this->get_mid($task_id)){
				$this->db->where("id",$task_id);
				$this->db->update("tasks",$task);
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
	}

		
?>
