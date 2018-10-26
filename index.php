<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>

	<div class="content">
			
		<form action="">
			<input type="text" value="">
			<input type="submit" value="Invia">
		</form>
	<?php 
	$adress = "via%20Roma%202%2042123%20reggio%20emilia";

$myJsonData = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=$adress&key=GMAPS KEY");
$myArrayData = json_decode($myJsonData, 1);
foreach($myArrayData['results'] as $myItem){    
$lat = $myItem['geometry']['location']['lat'];
$lng = $myItem['geometry']['location']['lng'];
$cap = $myItem['address_components']['long_name']['lat'];
$city = $myItem['address_components']['location']['lat'];
}
printf("Latitude is %s and longitude is %s", $lat, $lng);
				
?>

		
	</div>
</body>
</html>
