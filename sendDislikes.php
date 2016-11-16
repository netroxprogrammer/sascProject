<?php session_start(); ?>
<?php  include_once 'config/config.php'; ?>
<?php  include_once 'libraries/Database.php';?>

<?php

$database = new Database ();

if($_GET['dislike']){
	$id =$_GET['dislike'];
$postId = $_GET['postId'];
$senderId = $_GET['senderId'];
$recvierId = $_GET['recvierId'];

///$count  = $database->getDataList("select sum(id) as id from poststatus");

	//$data = $count->fetch_assoc();
	//$c = $data['id'];
$str ="insert  into  poststatus(postId,userId,numberOfDisLikes,senderId) 
values('$postId','$recvierId',1,'$senderId')";





$addlikes = $database->addUserData($str);


header("Location: home.php");
}
	?>