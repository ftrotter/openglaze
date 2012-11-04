<?php 
	session_start(); 
	$link = mysql_connect('localhost', 'admin', 'admin');
	if (!$link) {
	    die('Could not connect to server: ' . mysql_error());
	}
	$db = mysql_select_db("qr_test", $link);
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
</head>
<body>
	<p> Uploaded successfully! </p>
</body>
</html>