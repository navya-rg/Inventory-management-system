<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
</head>
<body>
	<?php
	$conn = mysqli_connect('127.0.0.1','root','');
            if(! $conn ) {
            	echo 'Connection failed';
               die('Could not connect: ' . mysqli_connect_error());
            }
            else{
            	echo 'Connection succesful';
            }
    ?>
</body>
</html>