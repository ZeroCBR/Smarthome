<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class tag_model extends CI_Model{

		function __construct(){
                        parent::__construct();
                }
		
		function add_tag($tag_info){
			if(isset($tag_info)&& $this->session->userdata("uid")){
				$tag['user_id']=$this->session->userdata('uid');
				$tag['tag_name'] = $tag_info['tag_name'];
				if(!empty($tag_info['intro'])){
					$tag['intro'] = $tag_info['intro'];	
				}
				$this->db->insert("tags",$tag);
				return true;
			}
			return false;
		}		
		
		function delete_tag($id){
			if($this->get_tag($id)){
				$this->db->delete('tags',array('id'=>$id));
			}
		}
		
		function get_tag($id){
			$query = $this->db->get_where('tags',array('id'=>$id)) -> result();
			return $query;
		}

		function list_tag(){
			if($this->session->userdata("uid")){
				$tag_list = $this->db->get_where('tags', array('user_id'=>$this->session->userdata('uid'))) -> result();
        	                return $tag_list;
			}
		}
		
		function count_machine($tag_list){
			$tags_count = array();
			foreach($tag_list as $tag){
				$query = $this->db->get_where("machines",array('tag_id'=>$tag->id)) -> result();
				$tags_count[] = count($query);			
			}
			return $tags_count;
		}
	
	}

?>
