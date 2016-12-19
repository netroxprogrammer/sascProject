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
               $updaetMessage =   $database->updateData("update studentnewsupdates set status='read' "
                                  . "where batch='$mBatch' AND semester='$msemster' AND program='$getprogramId' AND  section='$getmsection' ");
               if($updaetMessage){
                   header("Location: readTeacherNews.php");
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
                                  . "where batch='$mBatch' AND semester='$msemster' AND program='$getprogramId' AND  section='$getmsection' "
                                  . " order by id desc");
                          if($allmessage){
                              while($getMessage = $allmessage->fetch_assoc()){
                                  $coordinatorId= $getMessage['teacherId'];
                                  $check = $getMessage['status'];
                                  $mesageId = $getMessage['id'];
                                  $getCoordinator =  $database->getDataList("Select *from users where userId='$coordinatorId' and userRole='teacher'");
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
                          
                         echo $getMessage['descreption']; ?>
                        <?php 
                          if($check=="unread"){
                              ?>
                            <div class="col-xs-offset-3">
                                
                                <a href="readTeacherNews.php?id=<?php echo $mesageId; ?>" class="btn btn-primary btn-xs">unread</a>
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