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
			$id = intval($this->uri->segment(3));

			$task_list = $this->task_model->list_task($id);
			
			$data = array("task_list"=>$task_list,"id"=>$id);
			$this->load->view("task/index",$data);
		}

		function add_task_form(){

			$from ="<div class='modal-header'>
        			<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
        			<h4 class='modal-title' id='myModalLabel'>New Task</h4>
      			</div>
      			<form class='form-horizontal' action = '".site_url("task/add_task")."/".$_POST['id']."'method='post'>
			<div class='modal-body'>
				
					<div class='form-group'>
						<label class='col-sm-4 control-label' for='title'>Title</label>
						<div class = 'col-sm-6'>
							<input id='title' name='title' class='form-control'/>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-4 control-label' for='time'>Running Time</label>
						<div class = 'col-sm-6'>
							<input id='time' class='form-control' name='time' placeholder='YY-MM-DD hh:mm'/>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-4 control-label' for='annotation'>Annotation</label>
						<div class = 'col-sm-6'>
							<input id='annotation' name='annotation' class='form-control'/>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-4 control-label' for='annotation'>Parameters</label>
						<div class = 'col-sm-6'>
							<input id='parameters' name='params' class='form-control'/>
						</div>
					</div>
       				
			</div>
			    
      			<div class='modal-footer'>
        			<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        			<input type='submit' class='btn btn-primary' value='Apply'>
      			</div>
      			</form> ";

			echo $from;
		}


		function delete_task($mid){
			$task = $this->task_model->get_mid($mid);
			//$mid = intval($this->uri->segment(3));
			if(isset($this->session->userdata['uid'])){
				$this->task_model->delete_task($mid);
				redirect('task/index/'.$task->machine_id,refresh);	
			}
			echo "Error\n";
		}


		function delete_task_form(){
			//$machine = $this->machine_model->get_machine($_POST['id']);
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
                                	<a class='btn btn-success' href='".site_url("task/delete_task")."/".$_POST['id']."'>Delete</a>
                        	  </div>";
			echo $result;
		}


		function add_task(){
			$id = intval($this->uri->segment(3));
			if($this->task_model->add_task($_POST,$id)){
				redirect("task/index/".$id,refresh);
			}
		}


		function edit_task_form(){
		 	$task = $this->task_model->get_mid($_POST['id']);				
			$form = "<div class='modal-header'>
                                	<button type='button' class='close' data-dismiss='modal' aria-hidden='tru'>&times;</button>
                                	<h4 class='modal-title' id='myModalLabel'>Edit Task</h4>
                        	</div>
				<form class='form-horizontal' action = '".site_url("task/edit_task")."/".$_POST['id']."' method='post' >
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

		function edit_task($mid){
			$tid = intval($this->uri->segment(3));
			$id = $this->task_model->get_mid($mid);
			$task['title'] = $_POST['title'];
			$task['params'] = $_POST['params'];
			$task['deadline'] = $_POST['deadline'];
			$task['annotation'] = $_POST['annotation'];
			if($this->task_model->edit_task($tid,$task)){
				redirect("task/index/".$id->machine_id,refresh);
			
			}
			echo "Error\n";	
		}

		function test(){
			$this->load->view('share/_login_nav');
		}
		
	}


?>
