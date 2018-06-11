<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		//header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<img src="images/user_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</small>

				<?php endif ?>
			</div>
		</div>
		
		
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
