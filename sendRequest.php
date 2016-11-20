<?php session_start(); ?>
<?php  include_once 'config/config.php'; ?>
<?php include_once 'config/Settings.php';?>
<?php  include_once 'libraries/Database.php';?>
<?php include_once 'libraries/Upload.php';?>
<?php

$senderId = $_GET['senderId'];
$friendId = $_GET['friendId'];
$database = new Database();
echo $senderId;
echo $friendId;
$str = "insert into sendfriendrequest(friendId,senderId) values('$friendId','$senderId')";

$result = $database->addUserData($str);

if($result){
    header("Location: findFriends.php");
}

?>