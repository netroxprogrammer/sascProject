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
<h2><i class="glyphicon glyphicon-th"></i>View Final Term Marks</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
<thead>
<tr>
 <th>Teacher Name</th>
<th>Subject</th>
<th>Quiz Marks</th>
<th>Total Quiz Marks</th>

</tr>
</thead>
<tbody>
  <?php  
  
   $userId = $_SESSION['userId'];
  $getuserDetails = $database->getDataList("select *from students where  userId='$userId'");
  if($getuserDetails){
      $usersRows = $getuserDetails->fetch_assoc();
      $batch = $usersRows['courseBatch'];
      $section = $usersRows['courseSection'];
      $program = $usersRows['program'];
      $semester = $usersRows['semester'];
      
      $email = $database->getDataList("select *from users where userId='$userId'")->fetch_assoc();
      $studentId = $email['userEmail'];
      $studentId = substr($studentId, 0, strpos($studentId, '@'));
      $sectionName=$database->getDataList("Select *from sections where sections ='$section'")->fetch_assoc();
      $sectionName = $sectionName['id'];
      
      $programName = $database->getDataList("select *from programs where programs='$program'")->fetch_assoc();
      $programId = $programName['id'];
    
  $timeTable = $database->getDataList("select *from addquizmarks  where studentId='$studentId' AND semester='$semester' AND batch='$batch' AND section='$sectionName' "
          . "AND program='$programId' AND type='final'");
  
  if($timeTable){
      while($timeTableRow =$timeTable->fetch_assoc()){?>
    <tr>
       
        <?php
        $userId = $timeTableRow['teacherId'];
        $getUserName = $database->getDataList("select *from users where userId='$userId'");
        if($getUserName){
            $userRow = $getUserName->fetch_assoc();?>
            
     
        <td> <?php  echo $userRow['firstName']." ".$userRow['lastName'];?></td>
        <?php }  ?>
        
        <?php
        $code = $timeTableRow['subject'];
      $getsection=$database->getDataList("Select *from courses where code ='$code'")->fetch_assoc();
       
      ?>
        <td><?php echo $getsection['name']; ?></td>
        
        <td><?php echo $timeTableRow['quizMarks']; ?></td>
        <td><?php echo $timeTableRow['totalQuizMarks']; ?></td>

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
<?php include_once 'includes/footer.php';
} 
}
?>