<?php 
	session_start(); 
	$server = 'ENTER_SERVER_HERE';
	$username = 'ENTER_USERNAME_HERE';
	$password = 'ENTER_PASSWORD_HERE';

	$link = mysql_connect($server, $username, $password);
	if (!$link) {
	    die('Could not connect to server: ' . mysql_error());
	}
	$dbName = 'ENTER_DB_NAME_HERE';
	$db = mysql_select_db($dbName, $link);
	if(!$db){
		die("Could not connect to db:" . mysql_error());
	}
	$result = $_POST['transloadit'];
	if (ini_get('magic_quotes_gpc') === '1') {
   		 $result = stripslashes($result);
	}
	$decode = json_decode($result, true);
	$_SESSION['thumb'] = $decode['results']['thumb']['0']['url'];
	$_SESSION['image'] = $decode['results'][':original']['0']['url'];

	$query = "INSERT INTO qr_test_table (endpoint, event, lat, longi, uuid, thumb, image) VALUES
		('$_SESSION[endpoint]', '$_SESSION[event]', $_SESSION[lat], $_SESSION[longi], '$_SESSION[uuid]', '$_SESSION[thumb]', '$_SESSION[image]')";
	if (!mysql_query($query, $link)){
		 die('Error: ' . mysql_error());
	}
	mysql_close($link);
	session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>QR IMG Upload</title>
	<link rel="stylesheet" type='text/css' href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class='midBox'>
		<p> Uploaded successfully! </p>
	</div>
</body>
</html>