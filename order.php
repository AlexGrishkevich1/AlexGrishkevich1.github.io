
<?php

	
	define("APIKEY", "OEIdzDa6rtZDX6cR3ZoflviVqOD57SVi");
	
	$handle = curl_init();

	$id = $_GET['orderId'];
	
	$url = "https://alina2.retailcrm.ru/api/v5/orders/".$id."?by=id&apiKey=".APIKEY;
	 
	curl_setopt($handle, CURLOPT_URL, $url);
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
	$output = curl_exec($handle);
	 
	curl_close($handle);
	$orderData = json_decode($output, TRUE) ;
	
	$lastName = isset($orderData["order"]["lastName"]) ? $orderData["order"]["lastName"] : "";
	$firstName = isset($orderData["order"]["firstName"]) ? $orderData["order"]["firstName"] : "";
	$patronymic = isset($orderData["order"]["patronymic"]) ? $orderData["order"]["patronymic"] : "";

	$adress = $orderData["order"]["customer"]["address"];
	$city = $adress['city'];
	$street = $adress['street'];
	$building = $adress['building'];
	$flat = $adress['flat'];
	
	$summ = $orderData["order"]["totalSumm"];
	
	echo "<div>ФИО:".$lastName." ".$firstName." ".$patronymic."</div>";
	echo "<div>".$city.", Улица: ".$street.", Строение: ".$building.", Помещение: ".$flat."</div>";
	echo "<div class='summ' data-value=".$summ.">Сумма заказа:".$summ."</div>";
?>
	
