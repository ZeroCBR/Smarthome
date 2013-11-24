<?php
        if($task_list==null){
                echo "<div class='row'><h2>Sorry, you don't have any task!</h2></div>";
        }
	else{
		//$this->load->view('machine/add_task_form');
		//$this->load->view('machine/edit_machine_form');
		//$this->load->view('machine/delete_machine_form');
		//$this->load->view('machine/task_list',$machine_list);

		echo "<div class='row'><table class='table table-striped'>
	        	<tr>
        	        	<th>Mechine ID</th>
                		<th>Machine Name</th>
	                	<th>Annotation</th>
	                	<th>Run Time</th>
	                	<th></th>
        		</tr>";
		foreach ($task_list as $value){
                	echo "	<tr>
                	      		<td>$value->machine_id</td>
                        		<td>$value->title</td>
                        		<td>$value->annotation</td>
                        		<td>$value->deadline</td>
                        		<td>
						<a data-toggle='modal' class='edit-task' data-id = '$value->id'>
							<i class='glyphicon glyphicon-pencil'></i>
						</a>
						&nbsp&nbsp
						<a data-toggle='modal' class='delete-task' data-id = '$value->id' >
							<i class='glyphicon glyphicon-trash'></i>
						</a>
					</td>
                		</tr>";
		}
		echo"</table></div>";
	}
?>
<script type="text/javascript">
$(document).ready(function(){
	$('.edit-task').click(function(event){
		console.log("asdf1");
		$.ajax({
			//console.log("asdf2");
			type: "post",
			data: "id="+$(this).attr('data-id'),
        	      	url : "<?= site_url("task/edit_task_form")?>",
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
		//console.log("asdf1");
		$.ajax({
                        type: "post",
                        data: "id="+$(this).attr('data-id'),
                        url : "<?= site_url("task/delete_task_form")?>",
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
