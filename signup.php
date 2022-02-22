<?php
session_start();
	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//Something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		check_creds($con, $user_name, $password);

		// if(!check_username($con, $user_name)){
		// 	echo "Username is taken!";
		// }elseif(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		// {
		// 	//Save to database
		// 	$user_id = random_num(20);
		// 	$query = "insert into users (user_id,user_name,password) values ('$user_id', '$user_name', '$password')";
		// 	if(!mysqli_query($con,$query)){
		// 		echo("Error description: " . mysqli_error($con));
		// 	}
		// 	header("Location: login.php");
		// 	die;
		// }else{
		// 	echo "Please enter valid info";
		// }
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>
	<style type="text/css">
		#text{
			height: 25px;
			border-radius: 5px;
			padding: 4px;
			border: solid thin #aaa;
			width: 100%;
		}

		#button{
			padding: 10px;
			width: 100px;
			color: white;
			background-color: blue;
			border: none;
		}

		#box{
			background-color: grey;
			margin: auto;
			width: 300px;
			padding: 20px;
		}

	</style>


	<div id="box">
		<form method="post">
			<div style="font-size: 20px; margin: 10px; color: white;">Sign Up</div>
			<input id="text" type="text" name="user_name"> <br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Sign Up"><br><br>
			<a id="button" href="login.php">Login</a><br><br>

		</form>
	</div>

</body>
</html>