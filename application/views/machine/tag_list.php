<div class="container main-content col-md-10 col-md-offset-1">
	<?php 
		$this->load->view("machine/add_tag_form");
		$this->load->view("machine/delete_tag_form");
	?>
	<div class="row col-md-12 col-md-offset-11">
		<a class="btn btn-primary tag-button add-button" data-toggle="modal" data-target="#add_tag_modal">
			<span class="glyphicon glyphicon-plus"></span>Add Tag
		</a>
	</div>
	<div class="row">	
	<?php   $counter = 0;
		foreach($tags_list as $tag){
			echo "
					<div class='col-md-3'>	
						<div class='thumbnail tag'>
							<img src='".base_url()."assets/image/default_tag.png"."'></img>
							<div class='caption'>
								<h2 class='text-center' style='text-transform:capitalize'>".$tag->tag_name."</h2>
								<p class='tag-intro' style='font-size:16px'>".$tag->intro."</p>
								<p class='text-center text-info'>Machine Counts: <strong>".$tags_count[$counter]."</strong></p>
								<p style='padding-left: 18px;'>
									<a class='btn btn-default tag-button' href='".site_url('machine/manager_tag')."/".$tag->id."'>
										<span class='glyphicon glyphicon-wrench' role='button'></span> Manage
								   	</a>
	                                                                <button class='delete-tag btn btn-warning tag-button' data-toggle='modal' data-target= '#delete_tag_modal'  data-id = ".$tag->id." type = 'button'>

										<span class='glyphicon glyphicon-trash' role='button'></span> Delete
                                                                        </button>
								</p>
							</div>
						</div>	
					</div>
			";
			$counter ++;
		}
	?>	
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
        $('.delete-tag').click(function(){
                $.ajax({
                        type: "post",
                        data: "id="+$(this).attr('data-id'),
                        //console.log(data);
                        url : "<?= site_url("machine/delete_tag_form")?>",
                        success: function(result){
                                $("#delete_tag_modal .modal-content").html(result);
                                $("#delete_tag_modal").modal("show");
                        },
                        error: function(){
                                alert("ajax error");
                        }
                });
        });
});
</script>

