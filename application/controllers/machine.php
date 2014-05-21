<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 这个是machine 的controller, CBR请在这里调用model内的函数获取machine的list，YM请在这里调用model内的函数获取某个machine信息
* 第一个function是constructor
**/
	class machine extends CI_Controller{
	
		function __construct(){
			parent::__construct();
			$this->load->model('machine_model');
			$this->load->model('tag_model');
		}

		function index(){
			if($this->session->userdata("email") && $this->session->userdata("username")){
				$tags_list = $this->tag_model->list_tag();
				$tags_count = $this->tag_model->count_machine($tags_list);	
                        	$data = array("load_page" =>"machine/tag_list","tags_list" => $tags_list, "tags_count"=>$tags_count);
                        	$this->load->view("machine/index",$data);
			}
		}
		
                function statistics(){
			$result = $this->get_statistics();
                        $data = array("load_page"=>"share/_statistics_nav","result"=>$result);
                        $this->load->view('public/index',$data);
                }

		
		function add_machine(){
			$machine_info = $_POST;
                        $machine_info['tag_id'] = intval($this->uri->segment(3));
			print_r($machine_info);
			if($this->machine_model->add_machine($machine_info)){
				redirect("machine/manager_tag/".$machine_info['tag_id'],'refresh');
			}
		}
		
		function edit_machine(){
			$mid = intval($this->uri->segment(3));
			if(isset($this->session->userdata['uid'])){
				$machine['name'] = $_POST['name'];
				$machine['annotation'] = $_POST['annotation'];
				if($this->machine_model->edit_machine($mid,$machine)){
					redirect("machine",refresh);
				}
			}
			echo "Error\n";	
		}

		function delete_machine(){
			$mid = intval($this->uri->segment(4));
			$tid = intval($this->uri->segment(3));
			if(isset($this->session->userdata['uid'])){
				$this->machine_model->delete_machine($mid);
				redirect('machine/manager_tag/'.$tid,refresh);	
			}
			echo "Error\n";
		}
				
		function edit_machine_form(){
		 	$machine = $this->machine_model->get_machine($_POST['id']);				
			$form = "<div class='modal-header'>
                                	<button type='button' class='close' data-dismiss='modal' aria-hidden='tru'>&times;</button>
                                	<h4 class='modal-title' id='myModalLabel'>Edit Machine</h4>
                        	</div>
				<form class='form-horizontal' action = '".site_url("machine/edit_machine")."/".$_POST['id']."' method='post' >
                                <div class='modal-body'>
                                        <div class='form-group'>
                                                <label class='col-sm-4 control-label' for='name'>Name</label>
                                                <div class = 'col-sm-6'>
                                                        <input id='name' name='name' class='form-control' value = '".$machine->name."'/>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                                <label class='col-sm-4 control-label' for='annotation'>Annotation</label>
                                                <div class = 'col-sm-6'>
                                                       <textarea id='annotation' name='annotation' class='form-control rows='3'>".$machine->annotation."</textarea>
                                                </div>
                                        </div>
                                </div>
                                <div class='modal-footer'>
                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                                        <input type='submit' class='btn btn-primary' value ='Apply It!'>
                                </div>
                        </form>";
			
			echo $form;
		}
		
		function delete_machine_form(){
			$machine = $this->machine_model->get_machine($_POST['id']);
			$result ="<div class='modal-header'>
                                	<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                	<h4 class='modal-title' id='myModalLabel'>System Message</h4>
                        	  </div>
                        	  <div class='modal-body '>
                                       <h3> <span>Are you confirm to delete ".$machine->name." ?</span> </h3>
                                  </div>
                        	  <div class='modal-footer'>
                                	<button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                                	<a class='btn btn-success' href='".site_url("machine/delete_machine")."/".$_POST['tid']."/".$_POST['id']."'>Delete</a>
                        	  </div>";
			echo $result;
		}
	
		function add_tag(){
        	        if($this->tag_model->add_tag($_POST)){
                                redirect("machine",'refresh');
                        }
	        }

		function delete_tag_form(){
			$tag = $this->tag_model->get_tag($_POST['id']);
			$result ="<div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                        <h4 class='modal-title' id='myModalLabel'>System Message</h4>
                                  </div>
                                  <div class='modal-body '>
                                       <h3> <span>Are you confirm to delete ".$tag[0] -> tag_name." ?</span> </h3>
                                  </div>
                                  <div class='modal-footer'>
                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                                        <a class='btn btn-success' href='".site_url("machine/delete_tag")."/".$_POST['id']."'>Delete</a>
                                  </div>";
			echo $result;	
		}
		
		function delete_tag(){
			$id = intval($this->uri->segment(3));
			if(isset($this->session->userdata['uid'])){
				$this->tag_model->delete_tag($id);
				redirect("machine","refresh");
			}
		
		}
		
		function manager_tag(){
			$tag_id = intval($this->uri->segment(3));
			$machine_list = $this->machine_model->list_machine($tag_id);
			$data = array('load_page'=>'machine/machine_list','tag_id'=>$tag_id, 'machine_list' => $machine_list);
			$this->load->view('machine/index',$data);	
		}
		
		function get_statistics(){
			$result = $this->machine_model->get_statistics();
			return $result;
		}
		
		function noti(){
			$data['load_page'] = "machine/noti";
			$this->load->view('machine/index',$data);
		}
	
	}

?>
