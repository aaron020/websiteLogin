<?php
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	foreach ($user_data as $value) {
		echo $value . "<br>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Website</title>
</head>
<body>
	<a href="logout.php">Logout</a>
	<h1>This is the index</h1>

	<br>
	Hello, <?php echo $user_data['user_name'];?>
</body>
</html>