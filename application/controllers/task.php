<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
        *  这个是控制machine的controller，第一个function是constructor, 初始化请往里面加。YM要在这里获取task的列表以及添加task。
        *
        **/
	class task extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model('task_model');
		}
		
		function index(){

			//$this->load->view('share/_login_nav');
			if(!$this->session->userdata('type')){
				$id = intval($this->uri->segment(3));
			}
			else{
				$id = $_POST['mid'];
			}
			$task_list = $this->task_model->list_task($id);
			
			if(!$this->session->userdata('type')){
				$data = array("task_list"=>$task_list,"id"=>$id, "load_page"=>"task/task_list");
				$this->load->view("task/index",$data);
			}
			else{		
				$result;		
				foreach($task_list as $task){
					$result[] = array("deadline"=>$task->deadline,"title"=>$task->title);
				}
				echo json_encode($result);
			}
		}


		function delete_task($mid){
			$task_id = intval($this->uri->segment(4)) ;
			$mid = intval($this->uri->segment(3));
			if(isset($this->session->userdata['uid'])){
				$this->task_model->delete_task($task_id);
				redirect('task/index/'.$mid,'refresh');	
			}
			echo "Error\n";
		}


		function delete_task_form(){
			$task = $this->task_model->get_mid($_POST['id']);
			$result ="<div class='modal-header'>
                                	<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                	<h4 class='modal-title' id='myModalLabel'>System Message</h4>
                        	  </div>
                        	  <div class='modal-body '>
                                       <h3> <span>Are you confirm to delete ".$task->title." ?</span> </h3>
                                  </div>
                        	  <div class='modal-footer'>
                                	<button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                                	<a class='btn btn-success' href='".site_url("task/delete_task")."/".$this->uri->segment(3)."/".$_POST['id']."'>Delete</a>
                        	  </div>";
			echo $result;
		}


		function add_task(){
			if(!$this->session->userdata("type")){
				$mid = intval($this->uri->segment(3));
				if($this->task_model->add_task($_POST,$mid)){
        	                        redirect("task/index/".$mid,'refresh');
	      		        }

			}
			else{
				$mid = $_POST['mid'];
				if($this->task_model->add_task($_POST,$mid)){
					$this->index();	
				}
			}
		}


		function edit_task_form(){
		 	$task = $this->task_model->get_mid($_POST['id']);				
			$form = "<div class='modal-header'>
                                	<button type='button' class='close' data-dismiss='modal' aria-hidden='tru'>&times;</button>
                                	<h4 class='modal-title' id='myModalLabel'>Edit Task</h4>
                        	</div>
				<form class='form-horizontal' action = '".site_url("task/edit_task")."/".$this->uri->segment(3)."/".$_POST['id']."' method='post' >
                                <div class='modal-body'>
                                        <div class='form-group'>
                                                <label class='col-sm-4 control-label' for='name'>Title</label>
                                                <div class = 'col-sm-6'>
                                                        <input id='title' name='title' class='form-control' value = '".$task->title."'/>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                                <label class='col-sm-4 control-label' for='name'>Annotation</label>
                                                <div class = 'col-sm-6'>
                                                        <input id='annotation' name='annotation' class='form-control' value = '".$task->annotation."'/>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                                <label class='col-sm-4 control-label' for='name'>Params</label>
                                                <div class = 'col-sm-6'>
                                                        <input id='params' name='params' class='form-control' value = '".$task->params."'/>
                                                </div>
                                        </div>

                                          <div class='form-group'>
                                                <label class='col-sm-4 control-label' for='name'>Time</label>
                                                <div class = 'col-sm-6'>
                                                        <input id='deadline' name='deadline' class='form-control' value = '".$task->deadline."'/>
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

		function edit_task(){
			$tid = intval($this->uri->segment(4));
			$mid = intval($this->uri->segment(3));
			$task['title'] = $_POST['title'];
			$task['params'] = $_POST['params'];
			$task['deadline'] = $_POST['deadline'];
			$task['annotation'] = $_POST['annotation'];
			if($this->task_model->edit_task($tid,$task)){
				redirect("task/index/".$mid,'refresh');
			}
			echo "Error\n";	
		}

	}

?>
