<?php
function check_login($con)
{
	if(isset($_SESSION['user_id'])){
		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";
		$result = mysqli_query($con, $query);
		if($result && mysqli_num_rows($result) > 0){
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;
}

function check_creds($con, $user_name, $password){
	if(empty($user_name) || empty($password)){
		echo "Empty Values!";
		return;
	}
	if(!check_username($con, $user_name)){
		echo "Username is taken!";
		return;
	}
	if(is_numeric($user_name)){
		echo "Username cannot be all numbers!";
		return;
	}

	if(strlen($password) < 8){
		echo "Password must be longer than 8 characters";
		return;
	}

	//Save to database
	$user_id = random_num(20);
	$query = "insert into users (user_id,user_name,password) values ('$user_id', '$user_name', '$password')";
		/*
		if(!mysqli_query($con,$query)){
			echo("Error description: " . mysqli_error($con));
		}
		*/
	header("Location: login.php");
	die;



}


function check_username($con, $user_name){
	$query = "select * from users where user_name = '$user_name' limit 1";
	$result = mysqli_query($con, $query);

	if($result){

		if($result && mysqli_num_rows($result) > 0){
			return false;
		}
	}
	//Username is available 
	return true;
} 


function random_num($length){
	$text = "";
	if($length < 5){
		$length = 5;
	}

	$len = rand(4,$length);
	for ($i=0; $i < $len; $i++) { 
		$text .= rand(0,9);
	}
	return $text;
}