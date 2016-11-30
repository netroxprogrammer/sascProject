<?php session_start();  ?>

<?php
if(isset($_SESSION['email']) && isset($_SESSION['userId']) &&
isset($_SESSION['userRole']) && $_SESSION['userRole']=="teacher"){
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
<h2><i class="glyphicon glyphicon-th"></i>View Date Sheets</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
<thead>
<tr>
<th>Coordinator Name</th>
<th>Subject</th>
<th>Class Time</th>
<th>Class Name</th>
<th>batch</th>
<th>Section</th>
<th>Program</th>
</tr>
</thead>
<tbody>
  <?php  
  $teacherId = $_SESSION['userId'];
  
  $timeTable = $database->getDataList("select *from uplaodtimetable where  teacherId='$teacherId'");
  
  if($timeTable){
      while($timeTableRow =$timeTable->fetch_assoc()){?>
    <tr>
        
        <?php
        $userId = $timeTableRow['userId'];
        $getUserName = $database->getDataList("select *from users where userId='$userId'");
        if($getUserName){
            $userRow = $getUserName->fetch_assoc();?>
            
     
        <td> <?php  echo $userRow['firstName']." ".$userRow['lastName'];?></td>
        <?php    }
        $course = $timeTableRow['subject'];
        $subject = $database->getDataList("Select *from  courses where code ='$course'");
        if($subject){
            $subjectRow =  $subject->fetch_assoc();
            ?>
        <td>  <?php echo $subjectRow['name']; ?> </td>
       <?php }
        ?>
        <td><?php echo $timeTableRow['classTime']; ?></td>
        <?php  $class = $timeTableRow['className'];
        $classNames =  $database->getDataList("Select *from classnames where  id='$class'"); 
        if($classNames){
            $classRow = $classNames->fetch_assoc();
            ?>
         <td><?php echo $classRow['className']; ?></td>
        <?php }
        ?>
        <td><?php echo $timeTableRow['batch']; ?></td>
        <?php 
        $section = $timeTableRow["batch"];
        $sections = $database->getDataList("select *from sections where id='$section'");
        if($section)
            $sectionRow = $sections->fetch_assoc();
            {?>
        <td> <?php  echo $sectionRow['sections'] ?> </td>
      <?php  }
           $program = $timeTableRow['program'];
           $programs = $database->getDataList("Select *from programs where id='$program'");
           if($programs){
               $programsRow =$programs->fetch_assoc();
               
               ?>
        <td><?php echo $programsRow['programs'];   ?></td>
           <?php }
        ?>


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