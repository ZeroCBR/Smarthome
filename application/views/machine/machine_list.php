<?php
	$this->load->view("machine/add_machine_form");
	$this->load->view("machine/delete_machine_form");
?>
<div class="container main-content col-md-10 col-md-offset-1">
	
	<div class="row col-md-12 col-md-offset-11">
                <a class="btn btn-primary add-button" data-toggle="modal" data-target="#add_machine_modal">
                        <span class="glyphicon glyphicon-plus"></span>Add Machine
                </a>
        </div>

	<div class="col-md-9 col-md-offset-1">
		<?php
			foreach($machine_list as $machine){
				echo "
					<div class='panel row machine-panel'>
						<div class='col-md-1'>
							<img class='img-circle' width='100px' height='100px' src='".base_url()."/assets/image/machine.png'></img>	
						</div>
						<div class='col-md-6 col-md-offset-1'>
							<h2>".$machine->name."</h2>
							<p>".$machine->annotation."</p>
						</div>
						<div class='col-md-4  machine-btn-group'>
                                                        <a class='btn btn-default tag-button' href='".site_url('task')."/index/".$machine->id."'>
                
								<span class='glyphicon glyphicon-wrench' role='button'></span> Manage
	                                                </a>
                                                        <button class='delete-machine btn btn-warning tag-button' data-toggle='modal' data-target= '#delete_machine_modal'  data-id ='".$machine->id."' type = 'button'>

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
        $('.delete-machine').click(function(){
                $.ajax({
                        type: "post",
                        data: "id="+$(this).attr('data-id')+"&tid="+<?=$this->uri->segment(3)?>,
                        //console.log(data);
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

