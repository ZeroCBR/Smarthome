<div class="modal fade" id="add_tag_modal" tabindex="-1" role="dialog" aria-labelledby="AddTagModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        	<div class="modal-content">
        		<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title" id="myModalLabel">New Tag</h4>
       			</div>
			<form class="form-horizontal" action = "<?= site_url("machine/add_tag")?>" method="post" >
				<div class="modal-body">	
					<div class="form-group">
						<label class="col-sm-4 control-label" for="name">Tag Name</label>
						<div class = "col-sm-6">
							<input id="name" name= 'tag_name' class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label" for="annotation">Annotation</label>
						<div class = "col-sm-6">
							<textarea id="intro" name='intro' class="form-control"  rows="3"></textarea>
						</div>
					</div>
       				</div>
				<div class="modal-footer">
         				<button type="button" class="btn tag-button btn-default" data-dismiss="modal">Cancel</button>
         				<input type="submit" class="btn tag-button btn-primary" value ="Done">
       				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
