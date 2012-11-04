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
	<link rel="stylesheet" type='text/css' href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

</head>
<body>
	<div class='midBox'>
		<p>Upload your picture!</p>
		<div id='formBox'>
			<form id="uploadForm" action="http://api2.transloadit.com/assemblies" enctype="multipart/form-data" method="POST">
			<input type="file" name="my_file" /><br>
			<input id='submitButton' type="submit" value="Upload">
			<?php
				$params = array('auth' => array('key' => 'ENTER_KEY_HERE'),
    					'template_id' => 'ENTER_TEMPLATE_ID_HERE',
    					'redirect_url' => 'display.php');
				echo '<input type="hidden" name="params" value="' . htmlentities(json_encode($params)) . '" />';
			?>
		</div>
	</div>
</form>

</body>
</html>