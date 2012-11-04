<?php
	session_start();
	$_SESSION['endpoint'] = $_GET['endpoint'];
	$_SESSION['event'] = $_GET['event'];
	$_SESSION['lat'] = $_POST['lat'];
	$_SESSION['longi'] = $_POST['longi'];
	$_SESSION['uuid'] = $_POST['uuid'];
	$_SESSION['lat'] = '10.1';
	$_SESSION['longi'] = '21.3';
	$_SESSION['uuid'] = 'f9sdh29nasd-sfsd-f3dfjsf';
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>QR Test</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="//assets.transloadit.com/js/jquery.transloadit2.js"></script>
	<script type="text/javascript">
   		// We call .transloadit() after the DOM is initialized:
   		$(document).ready(function() {
    			$('#uploadForm').transloadit({
     	   			wait: true
    	 		});
   		});
	</script>

</head>
<body>

	<form id="uploadForm" action="http://api2.transloadit.com/assemblies" enctype="multipart/form-data" method="POST">
	<input type="file" name="my_file" />
	<input type="submit" value="Upload">
	<?php
		$params = array('auth' => array('key' => '2613132aa0434c5ebe84cf1caeed12f3'),
    			'template_id' => 'e0c959954f1d486eadd42f1171a4ac4b',
    			'redirect_url' => 'display.php');
		echo '<input type="hidden" name="params" value="' . htmlentities(json_encode($params)) . '" />';
	?>
</form>

</body>
</html>