<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// echo "<pre>";
// var_dump($perenco);
// die;
?><!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="http://127.0.0.1:<?php echo $_SERVER['SERVER_PORT']; ?>/css/style.css">
	<script type="text/javascript" charset="utf-8">
		
	</script>
  </head>
  <body>
    <div class="wrapper">
	<div class="container">
		<img src="http://127.0.0.1:<?php echo $_SERVER['SERVER_PORT']; ?>/perenco2.png" class="ri" />
		<h1 id="mtsg">Staff Canteen Software</h1>
		
		<form class="form">
			<input type="password" placeholder="ENTER YOUR PIN CODE" id="password" />
		</form>
	</div>
	<ul class="bg-bubbles"><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li></ul>
</div>
    <script src='http://127.0.0.1:<?php echo $_SERVER['SERVER_PORT']; ?>/js/jquery.min.js'></script>
        <script src="http://127.0.0.1:<?php echo $_SERVER['SERVER_PORT']; ?>/js/index.js"></script>    
  </body>
</html>
<script>
$( "#password" ).keyup(function() {
	//alert( "Handler for .keyup() called." );
	var myLength = $("#password").val().length;
	var pin = $("#password").val();
	var nodash = <?php echo json_encode($nodash); ?>;
	var dash = <?php echo json_encode($dash); ?>;
	// Verifier que ce n'est pas un alphanumerique
	
	//alert(pin.length);
	if(pin.length === 4) {
		// alert(jQuery.inArray( pin, nodash ));
		// Pour ceux qui ont droit au dashboard
		if(jQuery.inArray( pin, nodash ) >= 0) {
			$('#mtsg').html('Impression du ticket en cours...');
			$('#mtsg').addClass('success');
			setTimeout(function(){
				$('#mtsg').removeClass('success');
				$('#mtsg').html('Staff Canteen Software');
				$.post( "print_ticket.php", { pin: pin, dash : "no", entree : "0", dessert : "0" } );	
				$('#password').val('');			
			}, 2000);
			return false;
		}
		if(jQuery.inArray( pin, dash ) >= 0) {
			$(location).attr('href', 'http://127.0.0.1:<?php echo $_SERVER['SERVER_PORT']; ?>/order/?pin='+pin)
			return false;
		}
		if(jQuery.inArray( pin, nodash ) === -1 && jQuery.inArray( pin, dash ) === -1) {
			//alert('Compte inexistant! Veuillez contactez un administrateur.');
			$('#mtsg').addClass('error');
			$('#mtsg').html('Compte inexistant! <br>Veuillez contactez un administrateur.');
			setTimeout(function(){
				$('#mtsg').removeClass('error');
				$('#mtsg').html('Staff Canteen Software');	
				$('#password').val('');
			}, 2000);
			return false;
		}
		
		
			
		
	}
});
</script>