
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
                               
                          $allmessage =   $database->getDataList("select *from updatenews  where status='$mBatch' order by id desc");
                          if($allmessage){
                              $getMessage = $allmessage->fetch_assoc();
                                  
                             
?>
<div id="alerts">

<audio id="audioplayer" autoplay=true>
    <source src="sound/ping.mp3" type="audio/mpeg">
   <source src="sound/ping.ogg" type="audio/ogg">
  Your browser does not support the audio element. </audio>
<li>

<img src="icons/icon.png" align="top" style="float:left; margin-right:2px;" />

<div><?php echo substr($getMessage['newsMessage'],0,100)?></div>
</li>
</div>
<?php
}
 }
}else {
	header ( "Location: index.php" );
}
?>