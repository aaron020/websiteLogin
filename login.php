<?php
session_start();
	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//Something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
			//Read to database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result){

				if($result && mysqli_num_rows($result) > 0){
					$user_data = mysqli_fetch_assoc($result);
					if ($user_data['password'] === $password) {
						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			/*
			if(!mysqli_query($con,$query)){
				echo("Error description: " . mysqli_error($con));
			}
			*/
			echo "Please enter valid info";
		}else{
			echo "Please enter valid info";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
			background-color: black;
			margin: auto;
			width: 300px;
			padding: 20px;
		}

	</style>


	<div id="box">
		<form method="post">
			<div style="font-size: 20px; margin: 10px; color: white;">Login</div>
			<input id="text" type="text" name="user_name"> <br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>
			<a id="button" href="signup.php">Sign Up</a><br><br>

		</form>
	</div>

</body>
</html>