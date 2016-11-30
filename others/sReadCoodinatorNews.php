<?php session_start();  ?>

<?php
if(isset($_SESSION['email']) && isset($_SESSION['userId']) &&
isset($_SESSION['userRole']) && $_SESSION['userRole']=="student"){
     include_once 'includes/header.php' ;
include_once '../config/config.php';  
include_once '../libraries/database.php'; 
$database = new Database();


?>
<div class="row">
   
         <form method="POST" enctype="multipart/form-data"> 
    <!--  Select Subject Name -->
<div class="box col-md-9">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Messages From Coordinator</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
<thead>
<tr>
<th>Coordinator Name</th>
<th>Message</th>
<th>Time</th>

</tr>
</thead>
<tbody>
  <?php  
  
  
  $timeTable = $database->getDataList("select *from updatenews");
  
  if($timeTable){
      while($timeTableRow =$timeTable->fetch_assoc()){?>
    <tr>
        
        <?php
        $userId = $timeTableRow['userId'];
        $getUserName = $database->getDataList("select *from users where userId='$userId'");
        if($getUserName){
            $userRow = $getUserName->fetch_assoc();?>
            
     
        <td> <?php  echo $userRow['firstName']." ".$userRow['lastName'];?></td>
        <?php }  ?>
        <td><?php echo $timeTableRow['newsMessage']; ?></td>
        
        <td><?php echo $timeTableRow['time']; ?></td>


<tr>
<?php      }
  }
  
  ?>
    
</tbody>
    </table>
    </div>
</div>
</div>
</div>
</div>
     
    <!--  End Row-->
</div>
<?php include_once 'includes/footer.php'; } ?>