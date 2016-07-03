<?php
defined('BASE') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html oncontextmenu="return false">
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
	<!-- keyboard widget css & script (required) -->
	<link href="http://127.0.0.1:<?php echo $_SERVER['SERVER_PORT']; ?>/css/keyboard.css" rel="stylesheet">
	<script src="http://127.0.0.1:<?php echo $_SERVER['SERVER_PORT']; ?>/js/jquery.keyboard.js"></script>
  </body>
</html>
<script>
$('#password').keyboard({
		layout: 'custom',
		customLayout: {
			'default' : [
				'C D E F',
				'8 9 A B',
				'4 5 6 7',
				'0 1 2 3',
				'{bksp} {a} {c}'
			]
		},
		accepted : function(event, keyboard, el){
			//alert('The content "' + el.value + '" was accepted!');
			validate();
		},
		usePreview : false,
		autoAccept: true,
		maxLength : 4,
		// Prevent keys not in the displayed keyboard from being typed in
		restrictInput : true,
		// include lower case characters (added v1.25.7)
		restrictInclude : 'a b c d e f',
		// don't use combos or A+E could become a ligature
		useCombos : false,
		// activate the "validate" callback function
		acceptValid : true,
		validate : function(keyboard, value, isClosing){
			// only make valid if input is 6 characters in length
			if(value.length === 4)
				return true;
			
			return false;
		}
	});
	
//$( "#password" ).keyup(function() {
	//alert( "Handler for .keyup() called." );
function validate(){	
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
			$(location).attr('href', 'http://127.0.0.1:<?php echo $_SERVER['SERVER_PORT']; ?>/order/?pin='+pin);
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
}

setInterval(function() {
	var dt = new Date();
	var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
	console.time("debut ajax");
	$.getJSON('http://127.0.0.1:<?php echo $_SERVER['SERVER_PORT']; ?>/order/get_orders', function(data) {
		console.log(data);
		var id = data[0].id; var starter = data[0].starter; var meal = data[0].meal; var dessert = data[0].dessert;
		var iduser = data[0].log_by; var date = data[0].date;
		if(jQuery.type(data) === "array") {
			var server= "<?php echo $this->config->item('server_url');  ?>index.php/account/updateExternal?";
			$.ajax({
				url: server+"&callback=?",
				data: "starter="+starter+"&meal="+meal+"&dessert="+dessert+"&date="+date+"&id_user="+iduser+"&place=client1",
				type: 'POST',
				success: function (resp) { 
					var myObj = $.parseJSON(resp); 
					$.getJSON("http://127.0.0.1:<?php echo $_SERVER['SERVER_PORT']; ?>/order/update_log?id="+id+"&starter="+myObj.starter+"&meal="+myObj.meal+"&dessert="+myObj.dessert+"&id_user="+myObj.id_user, function(data) {
						
					}); 
				},
				error: function(e) {
					//alert('Error: '+e);
				 }  
			});
		}		
    });
	console.timeEnd("fin ajax");
}, 30000);

// Check les nouveaux comptes créées
setInterval(function() {
	var dt = new Date();
	var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
	//if(dt.getHours() == '11' && dt.getMinutes() == '35') {
		//var server="http://127.0.0.1:<?php echo $_SERVER['SERVER_PORT']; ?>/updates/getupdates?";
		var server="http://127.0.0.1:<?php echo $_SERVER['SERVER_PORT']; ?>/updates/UpdatesT?";
		$.ajax({
			url: server+"&callback=?",
			data: "place=client1",
			type: 'GET',
			success: function (resp) { 
				setTimeout(function(){
					//$(location).attr('href', 'http://127.0.0.1:<?php echo $_SERVER['SERVER_PORT']; ?>/login');
				}, 4000);
					
			},
			error: function(e) {
				//alert('Error: '+e);
			}  
		});
	//}
}, 50000);

document.onmousedown=disableclick;
status="Right Click Disabled";
function disableclick(event) {
	if(event.button == 2) {
		return false;
	}
}

</script>