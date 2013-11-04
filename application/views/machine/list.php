<?php
        if($machine_list==null){
                echo "<div class='row'><h2>Sorry, you don't have any machine!</h2></div>";
        }
	else{
		$this->load->view('machine/add_task_form');
		$this->load->view('machine/edit_machine_form');
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
                	      		<td><a href='#'><img src= '".base_url()."assets/image/light.png' class='img-thumbnail machine-icon' /></a></td>
                        		<td>$value->name</td>
                        		<td>$value->annotation</td>
                        		<td>$value->created_time</td>
                        		<td>
						<a  data-toggle='modal' data-target='#edit_machine_modal'>
							<i class='glyphicon glyphicon-pencil'></i>
						</a>
						&nbsp&nbsp
						<a>
							<i class='glyphicon glyphicon-trash'></i>
						</a>
					</td>
                		</tr>";
		}
		echo"</table></div>";
	}
?>


