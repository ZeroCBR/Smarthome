<?php
        if($machine_list==null){
                echo "<div class='row'><h2>Sorry, you don't have any machine!</h2></div>";
        }
	else{
		$this->load->view('machine/add_task_form');
		$this->load->view('machine/edit_machine_form');
		$this->load->view('machine/delete_machine_form');
		//$this->load->view('machine/task_list',$machine_list);

		echo "<div class='row'><table class='table table-striped'>
	        	<tr>
        	        	<th>Image</th>
                		<th>Machine Name</th>
	                	<th>Annotation</th>
	                	<th>Create Time</th>
	                	<th></th>
        		</tr>";
		foreach ($machine_list as $value){
                	echo "	<tr>
                	      		<td><a href='task/index/$value->id'><img src= '".base_url()."assets/image/light.png' class='img-thumbnail machine-icon' /></a></td>
                        		<td>$value->name</td>
                        		<td>$value->annotation</td>
                        		<td>$value->created_time</td>
                        		<td>
						<a data-toggle='modal' class='edit-machine' data-id = '$value->id'>
							<i class='glyphicon glyphicon-pencil'></i>
						</a>
						&nbsp&nbsp
						<a data-toggle='modal' class='delete-machine' data-id = '$value->id' >
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
	$('.edit-machine').click(function(event){
		$.ajax({
			type: "post",
			data: "id="+$(this).attr('data-id'),
        	      	url : "<?= site_url("machine/edit_machine_form")?>",
       			success: function(result){
				$("#edit_machine_modal .modal-content").html(result);
				$("#edit_machine_modal").modal("show");
			},
			error: function(){
                        	alert("ajax error");
                        }
		});
	});
	$('.delete-machine').click(function(){
		$.ajax({
                        type: "post",
                        data: "id="+$(this).attr('data-id'),
                        url : "<?= site_url("machine/delete_machine_form")?>",
                        success: function(result){
                                $("#delete_machine_modal .modal-content").html(result);
                                $("#delete_machine_modal").modal("show");
                        },
                        error: function(){
                                alert("ajax error");
                        }
                });
	});
});
</script>
