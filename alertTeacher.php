
<?php session_start(); ?>
<?php  include_once 'config/config.php'; ?>
<?php include_once 'config/Settings.php';?>
<?php  include_once 'libraries/Database.php';?>
<?php include_once 'libraries/Upload.php';?>
<?php
$database = new Database();
if (isset ( $_SESSION ['email'] ) && isset ( $_SESSION ['userId'] )) {
    $userId = $_SESSION ['userId'];
	$firstName = $_SESSION ['firstName'];
	$lastName = $_SESSION ['lastName'];
	$userName = $firstName . " " . $lastName;
      
             $students = $database->getDataList("Select *from students where userId='$userId'");
                            if($students){
                                $myBatch = $students->fetch_assoc();
                               $mBatch  =$myBatch['courseBatch'];
                                 $msemster = $myBatch['semester'];
                               $msection = $myBatch['studentSection'];
                               $mcourseName = $myBatch['courceName'];
                               $mcourseBatch = $myBatch['courseBatch'];
                               $mcourseCode = $myBatch['courseCode'];
                               $mProgram = $myBatch['program'];
                               $getprogramId = $database->getDataList("Select *from programs where programs='$mProgram'")->fetch_assoc();
                               $getprogramId  =$getprogramId['id'];
                               $getmsection  = $database->getDataList("select *from sections where sections='$msection'")->fetch_assoc();
                               $getmsection = $getmsection['id'];
                     
                          $allmessage =   $database->getDataList("select *from studentnewsupdates  "
                                  . "where batch='$mBatch' AND semester='$msemster' AND program='$getprogramId' AND  section='$getmsection' AND status='unread'"
                                  . " order by id desc");
                           if($allmessage){
                              $getMessage = $allmessage->fetch_assoc();
                             $coordinatorId= $getMessage['teacherId'];
                                  $check = $getMessage['status'];
                                  $mesageId = $getMessage['id'];
                                  $getCoordinator =  $database->getDataList("Select *from users where userId='$coordinatorId' and userRole='teacher'");
                                if($getCoordinator){
                                  $getuserName = $getCoordinator->fetch_assoc();
                                  $userName= $getuserName['firstName'].$getuserName['lastName'];
?>
<div id="alerts">

<audio id="audioplayer" autoplay=true>
    <source src="sound/ping.mp3" type="audio/mpeg">
   <source src="sound/ping.ogg" type="audio/ogg">
  Your browser does not support the audio element. </audio>
<li>

<img src="icons/icon.png" align="top" style="float:left; margin-right:2px;" />

<div><?php echo $userName; ?></div>
</li>
</div>
<?php
}
                           }
}
}else {
	header ( "Location: index.php" );
}
?>