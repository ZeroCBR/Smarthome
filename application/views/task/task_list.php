<?php
	$this->load->view("task/add_task_form");
	$this->load->view("task/edit_task_form");
	$this->load->view("task/delete_task_form");
?>

<div class="container main-content col-md-10 col-md-offset-1">
        <div class="row col-md-12 col-md-offset-11">
                <a class="btn btn-primary add-task add-button" data-toggle="modal" data-target="#add_task_modal">
                        <span class="glyphicon glyphicon-plus"></span>Add Task
                </a>
        </div>

	<div class="col-md-9 col-md-offset-1">
                <?php
                        foreach($task_list as $task){
                                echo "
                                        <div class='panel row machine-panel'>
                                                <div class='col-md-1'>
                                                        <img class='img-circle' width='100px' height='100px' src='".base_url()."/assets/image/machine.png'></img>       
                                                </div>
                                                <div class='col-md-4 col-md-offset-1'>
                                                        <h2>".$task->title."</h2>
                                                        <p>".$task->annotation."</p>
                                                </div>
						<div class='col-md-2 deadline'>
							<p>".$task->deadline."</p>
						</div>
                                                <div class='col-md-4  machine-btn-group'>
                                                        <a class='btn btn-default tag-button edit-task' data-toggle='modal' data-target= '#edit_task_modal'  data-id ='".$task->id."' type = 'button'>
                
                                                                <span class='glyphicon glyphicon-wrench' role='button'></span> Manage
                                                        </a>
                                                        <button class='delete-task btn btn-warning tag-button' data-toggle='modal' data-target= '#delete_task_modal'  data-id ='".$task->id."' type = 'button'>

                                                                <span class='glyphicon glyphicon-trash' role='button'></span> Delete
                                                        </button>

                                                </div>
                                        
                                        </div>  
                                ";
                        }

                ?>
	</div>

		
</div>





<script type="text/javascript">
$(document).ready(function(){	

	$(".form_datetime").datetimepicker({
		format: 'yyyy-mm-dd hh:ii',
		autoclose: true,
		todayBtn:true
		});       

	$('.edit-task').click(function(event){
		$.ajax({
			type: "post",
			data: "id="+$(this).attr('data-id'),
        	      	url : "<?= site_url("task/edit_task_form")."/".$this->uri->segment(3)?>",
       			success: function(result){
				$("#edit_task_modal .modal-content").html(result);
				$("#edit_task_modal").modal("show");
			},
			error: function(){
                        	alert("ajax error");
                        }
		});
	});
	$('.delete-task').click(function(){
		$.ajax({
                        type: "post",
                        data: "id="+$(this).attr('data-id'),
                        url : "<?= site_url("task/delete_task_form")."/".$this->uri->segment(3)?>",
                        success: function(result){
                                $("#delete_task_modal .modal-content").html(result);
                                $("#delete_task_modal").modal("show");
                        },
                        error: function(){
                                alert("ajax error");
                        }
                });
	});
});
</script>
