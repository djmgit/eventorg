<?php
 // Include confi.php
 include_once('config.php');
 
 
 $qur = mysqli_query($conn,"select * from `Events`");
$result =array();
  while($r = mysqli_fetch_array($qur)){
    extract($r);
	$event = new stdClass();
	$event->eventname = $EventName;
	$event->eventinfo = $EventInfo;
	$event->eventdate = $EventDate;
	$event->eventtimestart = $EventTimeStart;
	$event->eventtimeend = $EventTimeEnd;
	$event->eventvenue = $EventVenue;
	array_push($result,$event);
	}
	$json = array("status" => 1, "info" => $result);
 
 @mysqli_close($conn);
 
 /* Output header */
 header('Content-type: application/json');
 echo json_encode($json);