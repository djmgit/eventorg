<?php

// Include confi.php
include_once('config.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
	// Get data
	$eventname = isset($_POST['eventname']) ? mysqli_real_escape_string($conn,$_POST['eventname']) : "";
	$eventinfo = isset($_POST['eventinfo']) ? mysqli_real_escape_string($conn,$_POST['eventinfo']) : "";
	$eventdate = isset($_POST['eventdate']) ? mysqli_real_escape_string($conn,$_POST['eventdate']) : "";
	$eventtimestart = isset($_POST['eventtimestart']) ? mysqli_real_escape_string($conn,$_POST['eventtimestart']) : "";
	$eventtimeend = isset($_POST['eventtimeend']) ? mysqli_real_escape_string($conn,$_POST['eventtimeend']) : "";
	$eventvenue = isset($_POST['eventvenue']) ? mysqli_real_escape_string($conn,$_POST['eventvenue']) : "";

	// Insert data into data base
	$sql = "INSERT INTO `MasterClub`.`Events` (`EventId`,`EventName`, `EventInfo`, `EventDate`, `EventTimeStart`,`EventTimeEnd`,`EventVenue`) VALUES (NULL, '$eventname', '$eventinfo', '$eventdate', '$eventtimestart','$eventtimeend','$eventvenue');";
	//$sql = "INSERT INTO `MasterClub`.`Events` (`EventName`) VALUES (NULL, `$eventname`);";
	$qur = mysqli_query($conn,$sql);
	if($qur){
		$json = array("status" => 1, "msg" => "Event created!");
	}else{
		$json = array("status" => 0, "msg" => "Error creating user!");
	}
}else{
	$json = array("status" => 0, "msg" => "Request method not accepted");
}

@mysqli_close($conn);

/* Output header */
	header('Content-type: application/json');
	echo json_encode($json);

?>	