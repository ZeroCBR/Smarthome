<?php
	$this->load->view('share/_header');
	$this->load->view('share/_login_nav'); 
?>

<div class="container">
		<?php
			$this->load->view('task/add_task_form');
			$this->load->view('task/delete_task_form');
			$this->load->view('task/task_list');
			$this->load->view('task/edit_task_form');
            //$this->load->view('machine/list',$task_list);
        ?>
		<div class="btn-group col-md-2 col-md-offset-10">
			<button class="add-task btn btn-primary" data-toggle='modal' data-target= '#add_task_modal'  data-id = <?php echo $id?> type = "button">
				<i class="glyphicon glyphicon-plus"></i>&nbsp Add Taks
			</button>
		</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('.add-task').click(function(){
		//console.log("asdf1");
		$.ajax({
                        type: "post",
                        //console.log("asdf");
                        data: "id="+$(this).attr('data-id'),
                        //console.log(data);
                        url : "<?= site_url("task/add_task_form")?>",
                        success: function(result){
                                $("#add_task_modal .modal-content").html(result);
                                $("#add_task_modal").modal("show");
                        },
                        error: function(){
                                alert("ajax error");
                        }
                });
	});
});
</script>