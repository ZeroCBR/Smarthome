<div class="modal fade" id="add_machine_modal" tabindex="-1" role="dialog" aria-labelledby="AddMachineModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        	<div class="modal-content">
        		<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title" id="myModalLabel">New Machine</h4>
       			</div>
      			<div class="modal-body">
				<form class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-4 control-label" for="name">Name</label>
						<div class = "col-sm-6">
							<input id="name" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label" for="annotation">Annotation</label>
						<div class = "col-sm-6">
							<textarea id="annotation" class="form-control"  rows="3"></textarea>
						</div>
					</div>
       				</form>      
       			</div>
			<div class="modal-footer">
         			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
         			<button type="button" class="btn btn-primary">Add It !</button>
       			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
