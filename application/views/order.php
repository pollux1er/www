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
	<link href='http://fonts.googleapis.com/css?family=Inconsolata|Lato:300,400,700,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
	<script type="text/javascript" charset="utf-8">

	</script>
	<style>
		
	</style>
  </head>
  <body class="bois">
 <div id="container">
	<div id="content">
		<div id="solde">Solde | <span id="entree">01</span>Entrée(s) <span id="repas">11</span>Repas <span id="dessert">03</span>Dessert</div>
		<div id="form">
			
				<div style="background-color: rgba(247, 251, 255, 0.5); color:#222; padding:10px; margin-top: 5%;margin-bottom: 5%;">
					<h3>Faite votre choix</h3>
					<table width="95%">
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td width="75%">
								
								<input type="checkbox" name="checkboxG4" id="checkboxG4" class="css-checkbox" />
								<label for="checkboxG4" class="css-label">Entree</label>
								
							</td>
							<td>
								<div class="input-group">
									<span class="input-group-btn">
										<button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="entree">
											<span class="glyphicon glyphicon-minus"></span>
										</button>
									</span>
									<input type="text" name="entree" class="form-control input-number" style="width:42px" value="0" min="0" max="10">
									<span class="input-group-btn">
										<button type="button" class="btn btn-success btn-number" data-type="plus" data-field="entree">
											<span class="glyphicon glyphicon-plus"></span>
										</button>
									</span>
								</div>
							</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td>
								<input type="checkbox" name="checkboxG5" id="checkboxG5" class="css-checkbox" checked="checked"/>
								<label for="checkboxG5" class="css-label">Plat de Resistance</label>
							</td>
							<td>
								<div class="input-group">
									<span class="input-group-btn">
										<button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="repas">
											<span class="glyphicon glyphicon-minus"></span>
										</button>
									</span>
									<input type="text" name="repas" class="form-control input-number" style="width:42px" value="1" min="1" max="5">
									<span class="input-group-btn">
										<button type="button" class="btn btn-success btn-number" data-type="plus" data-field="repas">
											<span class="glyphicon glyphicon-plus"></span>
										</button>
									</span>
								</div>
							</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td>
								<input type="checkbox" name="checkboxG6" id="checkboxG6" class="css-checkbox" />
								<label for="checkboxG6" class="css-label"> Dessert</label>
							</td>
							<td>
								<div class="input-group">
									<span class="input-group-btn">
										<button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="dessert">
											<span class="glyphicon glyphicon-minus"></span>
										</button>
									</span>
									<input type="text" name="dessert" class="form-control input-number" style="width:42px" value="0" min="0" max="5">
									<span class="input-group-btn">
										<button type="button" class="btn btn-success btn-number" data-type="plus" data-field="dessert">
											<span class="glyphicon glyphicon-plus"></span>
										</button>
									</span>
								</div>
							</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
					</table>
				</div>
				<div id="buttons">
					<button class="btn-class annuler">Annuler</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn-class">Imprimer Ticket</button>
				</div>
			
		</div>
	</div>
	<div id="navbar">
		<img src="http://127.0.0.1:<?php echo $_SERVER['SERVER_PORT']; ?>/perenco2.png" class="ri" />
		<h1 id="">Staff Canteen</h1>
	</div>
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
	var contracted = <?php echo json_encode($contracted); ?>;
	var perenco = <?php echo json_encode($perenco); ?>;
	// Verifier que ce n'est pas un alphanumerique
	
	
	if(myLength === 4) {
		$('#password').val('');
		if(jQuery.inArray( pin, contracted ) === 0) {
			$('#mtsg').html('Impression du ticket en cours...');
			$('#mtsg').addClass('success');
			setTimeout(function(){
				$('#mtsg').removeClass('success');
				$('#mtsg').html('Staff Canteen Software');
				$.post( "test.php", { name: "John", time: "2pm" } );				
			}, 2000);
			return false;
		}
		if(jQuery.inArray( pin, contracted ) === -1 && jQuery.inArray( pin, perenco ) === -1) {
			//alert('Compte inexistant! Veuillez contactez un administrateur.');
			$('#mtsg').addClass('error');
			$('#mtsg').html('Compte inexistant! <br>Veuillez contactez un administrateur.');
			setTimeout(function(){
				$('#mtsg').removeClass('error');
				$('#mtsg').html('Staff Canteen Software');	
			}, 2000);
			return false;
		}
		
		if(jQuery.inArray( pin, perenco ) === 0) {
			$(location).attr('href', 'http://127.0.0.1:<?php echo $_SERVER['SERVER_PORT']; ?>/order')
			return false;
		}
			
		
	}
});

	$(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
});

$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

$('.annuler').click(function() {
	history.go(-1); 
   return false;
});
</script>