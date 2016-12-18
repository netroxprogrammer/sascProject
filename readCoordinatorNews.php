<?php session_start(); ?>
<?php  include_once 'config/config.php'; ?>
<?php include_once 'config/Settings.php';?>
<?php  include_once 'libraries/Database.php';?>
<?php include_once 'libraries/Upload.php';?>
<?php include_once 'elements/HomeElem.php'; ?>
  <?php

$database = new Database ();
if (isset ( $_SESSION ['email'] ) && isset ( $_SESSION ['userId'] )) {
	$userId = $_SESSION ['userId'];
	$firstName = $_SESSION ['firstName'];
	$lastName = $_SESSION ['lastName'];
	$userName = $firstName . " " . $lastName;
        if(isset($_GET['id'])){
            $msgId =  $_GET['id'];
             $students = $database->getDataList("Select *from students where userId='$userId'");
                            if($students){
                                $myBatch = $students->fetch_assoc();
                               $mBatch  =$myBatch['courseBatch'];
                               
               $updaetMessage =   $database->updateData("update updatenews set  value='read'  where status='$mBatch' AND id='$msgId' order by id desc");
               if($updaetMessage){
                   header("Location: readCoordinatorNews.php");
               }
                            }
        }
?>
<div class="container">
<h3>All News</h3>

    <div class="row">
        <div class="col-xs8">
            
                            <?php 
                            $students = $database->getDataList("Select *from students where userId='$userId'");
                            if($students){
                                $myBatch = $students->fetch_assoc();
                               $mBatch  =$myBatch['courseBatch'];
                               
                          $allmessage =   $database->getDataList("select *from updatenews  where status='$mBatch' order by id desc");
                          if($allmessage){
                              while($getMessage = $allmessage->fetch_assoc()){
                                  $coordinatorId= $getMessage['userId'];
                                  $check = $getMessage['value'];
                                  $mesageId = $getMessage['id'];
                                  $getCoordinator =  $database->getDataList("Select *from users where userId='$coordinatorId' and userRole='coordinator'");
                                if($getCoordinator){
                                  $getuserName = $getCoordinator->fetch_assoc();
                                  $userName= $getuserName['firstName'].$getuserName['lastName'];
                                  $colorClass = "";
                                  if($check=="unread"){
                                      $colorClass="alert alert-danger";
                                  }
                                  else{
                                       $colorClass="alert alert-info";
                                  }
                                  ?>
            
                        <div class="<?php echo $colorClass; ?>" role="alert">
                            <img src="img/users.png">  <a href=""><?php  echo $userName; ?></a><br>
                             <?php 
                          
                         echo $getMessage['newsMessage']; ?>
                        <?php 
                          if($check=="unread"){
                              ?>
                            <div class="col-xs-offset-3">
                                
                                <a href="readCoordinatorNews.php?id=<?php echo $mesageId; ?>" class="btn btn-primary btn-xs">unread</a>
                            </div>
                     <?php     }
                        ?>
                        </div>
                               
                               <?php          
                              }
                          }
                          }
                            }
                                    ?>
        
        </div>
        <div>
    
    
</div>
<?php
} else {
	header ( "Location: index.php" );
}
?>