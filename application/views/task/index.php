<?php
        $this->load->view('share/_header');
?>
<body class="main" sroll="no">
<div class="main-div">
        <div class="top">
                <?php $this->load->view("share/_topnav");?>
        </div>

        <?php $this->load->view($load_page);?>

</div>
<script type="text/javascript">
              //initiating jQuery
              jQuery(function($) {
                $(document).ready( function() {
                  //enabling stickUp on the '.navbar-wrapper' class
                	$('.top').stickUp();
                });
              });

</script>
</body>
