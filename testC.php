<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<style>
		input {
			display: block;
			width: 60%;
			margin: 5px auto;
		}
		</style>
	<head>
	<body>
		<form method='GET'>
			<input type='text' name = 'orderId' placeholder='Ид заказа'>
			<input type='submit' id='getOrderData' name='getOrderData' value='Получить данные о заказе'>
			<input type='submit' id='getDiscount' name='getDiscount' value='Получить скидку'>
		</form>
		<div id='new-block' class='new-block'></div>
		<div>
			<div id='discount'></div>
			<div id='newPrice'></div>
		</div>
		<script>
		
		$(document).ready(function(){
			 $( 'form' ).submit( function( e ) {
				e.preventDefault();
			 });
			 
			 $( '#getOrderData' ).click( function( e ) {
				 var idValue = document.querySelector('input[name="orderId"]').value;
				if (idValue == "") {
					alert('Вы не ввели id заказа!');
					return;
				}
				var orderId = document.querySelector('input[name="orderId"]').value;
				$.get('order.php?orderId='+ orderId).then(function(html){
					document.querySelector( '#new-block' ).innerHTML = html;
				})
			});
			$( '#getDiscount' ).click( function( e ) {
				var discount = "Скидка: 15%";
				document.querySelector('#discount').innerHTML = discount;
				
				var summ = document.querySelector('.summ').getAttribute('data-value');
				var newSumm = summ*(1-0.15);
				document.querySelector('#newPrice').innerHTML = 'Новая цена: '+newSumm;
			});

		})
		</script>
