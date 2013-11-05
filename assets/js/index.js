var loaded = false;
$(document).ready(function () {
	if(!loaded){ 
		$('.edit-machine').click(function(event){
                        //$.ajax({
                        //      url:<?php site_url("machine/get_machine_info")."/id="?> $(this).attr('data-id'),
                        //});
         		console.log(<?php site_url("machine/get_machine_info")."/id="?> $(this).attr('data-id'));
		});
	}
	loaded = true;
});
