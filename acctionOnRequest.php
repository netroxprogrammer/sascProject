<?php session_start(); ?>
<?php  include_once 'config/config.php'; ?>
<?php include_once 'config/Settings.php';?>
<?php  include_once 'libraries/Database.php';?>
<?php include_once 'libraries/Upload.php';?>

<?php

$database = new Database();
if(isset($_GET['action']) && isset($_GET['senderId'])){
    $action = $_GET['action'];
    $senderId = $_GET['senderId'];
    if($action=="accept"){
        $str = "update sendfriendrequest set status = 'yes' where senderId='$senderId'";
       $result =  $database->updateData($str);
       if($result){
           header("Location: acceptRequests.php");
       }
       else{
           header("Location: acceptRequests.php");
       }
    }
}

?>