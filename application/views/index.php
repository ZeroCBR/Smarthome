<?php   
        $this->load->view('share/_header'); 
?>
<body style=" overflow:hidden;">
<div class="index-top">
	<div class="banner">
    		<ul>
        		<li>HOME</li>
        		<li><?php $this->load->view('account/login_form')?></li>
        		<li><?php $this->load->view('account/register')?></li>
    			<li>END</li>
		</ul>
	</div>	
</div>

<div class="container">
	<ul class="buttom-nav nav nav-pills">
		<li class="col-md-2 one"><img src='<?=base_url()."assets/image/home.png"?>'></img></li>
		<li class="col-md-2 two"><img src='<?=base_url()."assets/image/SIGN.png"?>'></img></li>
		<li class="col-md-2 three"><img src='<?=base_url()."assets/image/UP.png"?>'></img></li>	
	</ul>
	<div class="container">
		<div class="jumbotron">
			<h1>Smart Home</h1>
			<p>Smarthome is a consumer electronics company specializing in home automation products, information, how-to videos and industry information.Through the SmartHome, user will be able to operate their home furnishing in real time. The purpose of the Smart Home Project is to devise a set of intelligent home appliances that can provide an awareness of the users' needs, providing them with a better home life experience without overpowering them with complex technologies and intuitive user interfaces. Our main aim for the project is to improve day-to-day home life with smart computer technologies while still keeping the home life as normal as possible – we refer to this as “digitally engineering analogue home life”.</p>
		</div>
	</div>	
</div>
</body>
<script>
$(function() {
	var slider = $('.banner').unslider({
			delay: 0,              //  The delay between slide animations (in milliseconds)
			keys: true,               //  Enable keyboard (left, right) arrow shortcuts
		});
	var data = slider.data('unslider');
	$('.one').click(function(){
		data.to(0);
	});
	$('.two').click(function(){
                data.to(1);
        });
	$('.three').click(function(){
                data.to(2);
        });


});
</script>
