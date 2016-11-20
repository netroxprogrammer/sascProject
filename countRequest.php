<?php session_start(); ?>
<?php  include_once 'config/config.php'; ?>
<?php include_once 'config/Settings.php';?>
<?php  include_once 'libraries/Database.php';?>
<?php include_once 'libraries/Upload.php';?>
<?php
$database = new Database();
$userId = $_SESSION['userId'];
$coutRequest = $database->getDataList("Select count(id) as id from  sendfriendrequest where  friendId= '$userId' and status='no'");
if($coutRequest){
$count = $coutRequest->fetch_assoc();
echo $count['id'];   
}
?>