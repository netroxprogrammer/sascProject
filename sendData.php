<?php session_start(); ?>
<?php  include_once 'config/config.php'; ?>
<?php  include_once 'libraries/Database.php';?>
<?php include_once 'libraries/Upload.php';?>
<?php

$database = new Database ();


			$str = "insert  into  posts(userName) 
			values('$userName')";
			$addPost = $database->addUserData ( $str );
			
	echo "Sdsdsdsd";
	
	?>