<?php session_start();  ?>

<?php
if(isset($_SESSION['email']) && isset($_SESSION['userId']) &&
isset($_SESSION['userRole']) && $_SESSION['userRole']=="coordinator"){
     include_once 'includes/header.php' ;
include_once '../config/config.php';  
include_once '../libraries/database.php'; 
$database = new Database();
if(isset($_POST['searchTime'])){
    if(isset($_POST['batch']) || !empty($_POST['batch']) &&
    isset($_POST['section']) || !empty($_POST['section']) &&
    isset($_POST['program']) || !empty($_POST['program'])){
       
        $batch = $_POST['batch'];
    $section = $_POST['section'];
    $programs = $_POST['program'];
    $makeSearch = "Select *from uplaodtimetable where batch='$batch' AND section='$section' AND program='$programs'";
?>
<div class="row">
    
    
         <form method="POST" > 
    <!--  Select Subject Name -->
<div class="box col-md-9">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>View Assign Courses Details</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
<thead>
<tr>
<th>Subject</th>
<th>Course Code</th>
<th>Class Time</th>
<th>Class Name</th>
<th>Teacher</th>
<th>Batch</th>
<th>Section</th>
<th>Program</th>
<th>Day</th>
</tr>
</thead>
<tbody>
   <?php  
   $getTimeTable  = $database->getDataList($makeSearch);
   if($getTimeTable){
   while($getTimeTableRow = $getTimeTable->fetch_assoc()){
       ?>
<?php 
  $code = $getTimeTableRow['subject'];
$courseName = $database->getDataList("select *from courses where  code='$code'");
if($courseName){
    $courseNameRow=$courseName->fetch_assoc();
?>
<td class="center">
<?php echo $courseNameRow['name']; ?>
</td>
<?php }?>
<td><?php echo $getTimeTableRow['code']; ?></td>
    <td><?php echo $getTimeTableRow['classTime']; ?></td>
    
    <?php  
     $className = $getTimeTableRow['className'];
$className = $database->getDataList("select *from  classnames where  id='$className'");
if($className){
    $classNameRow=$className->fetch_assoc();
    ?>
<td><?php echo $classNameRow['className']; ?></td><?php }?>
<td><?php echo $getTimeTableRow['teacher']; ?></td>
<td><?php echo $getTimeTableRow['batch']; ?></td>
<?php   $section = $getTimeTableRow['section'];
$sectionName = $database->getDataList("select *from sections where  id='$section'");
if($sectionName){
    $sectionNameRow=$sectionName->fetch_assoc();
?>
<td class="center"><?php  echo $sectionNameRow['sections'];?></td><?php } ?>
<?php   $program = $getTimeTableRow['program'];
$programName = $database->getDataList("select *from programs where  id='$program'");
if($programName){
    $programNameRow=$programName->fetch_assoc();
?>
<td class="center"> <?php echo $programNameRow['programs']; ?></td><?php }?>
<?php 
        $dayName = $getTimeTableRow['day'];
      $day  = $database->getDataList("select *from  weakdays where id='$dayName'");
        if($day){
          $dayRows =$day->fetch_assoc();?>
<td><?php echo $dayRows['name'];  ?></td>
                <?php
            }
        
        
        ?>


   <?php
   
}    
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
<?php 

}
}else{
    ?>
<script>
window.location="ViewTimeTable.php";
</script>

    
<?php }include_once 'includes/footer.php'; } ?>