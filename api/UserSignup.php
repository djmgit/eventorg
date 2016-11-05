<?php

// Include confi.php
include_once('config.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
	// Get data
	$email = isset($_POST['email']) ? mysqli_real_escape_string($conn,$_POST['email']) : "";
	$pass = isset($_POST['pass']) ? mysqli_real_escape_string($conn,$_POST['pass']) : "";
	$username = isset($_POST['username']) ? mysqli_real_escape_string($conn,$_POST['username']) : "";

	// Insert data into data base
	$sql = "INSERT INTO `MasterClub`.`Users` (`UserId`, `Email`, `Pass`, `UserName`) VALUES (NULL, '$email', '$pass', '$username');";
	$qur = mysqli_query($conn,$sql);
	if($qur){
		$json = array("status" => 1, "msg" => "Done User added!");
	}else{
		$json = array("status" => 0, "msg" => "Error adding user!");
	}
}else{
	$json = array("status" => 0, "msg" => "Request method not accepted");
}

@mysqli_close($conn);

/* Output header */
	header('Content-type: application/json');
	echo json_encode($json);

?>	