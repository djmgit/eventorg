<?php
 // Include confi.php
 include_once('config.php');
 
 $eventid = isset($_GET['eventid']) ? mysqli_real_escape_string($conn,$_GET['eventid']) :  "";
 if(!empty($eventid)){
	 $qur = mysqli_query($conn,"select * from `Events` where EventId='$eventid'");
	 $event = new stdClass();
	 while($r = mysqli_fetch_array($qur)){
		 extract($r);
		 
		 $event->eventname = $EventName;
		 $event->eventinfo = $EventInfo;
		 $event->eventdate = $EventDate;
		 $event->eventtimestart = $EventTimeStart;
		 $event->eventtimeend = $EventTimeEnd;
		 $event->eventvenue = $EventVenue;
		 
	 }
	 $json = array("status" => 1, "info" => $event);
 }else{
	 $json = array("status" => 0, "msg" => "Event ID not defined");
 }
 @mysqli_close($conn);
 
 /* Output header */
 header('Content-type: application/json');
 echo json_encode($json);