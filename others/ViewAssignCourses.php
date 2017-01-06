<?php session_start();  ?>

<?php
if(isset($_SESSION['email']) && isset($_SESSION['userId']) &&
isset($_SESSION['userRole']) && $_SESSION['userRole']=="coordinator"){
     include_once 'includes/header.php' ;
include_once '../config/config.php';  
include_once '../libraries/database.php'; 
$database = new Database();
if(isset($_GET['id'])){
   $id= $_GET['id'];
   $database->updateData("delete from assgincourses  where id='$id' ");
  ?>
<script>
window.location="ViewAssignCourses.php";
</script>
<?php
}


?>
<div class="row">
    <div class="box col-md-9">
<div class="box-inner">


</div>
    </div>
         <form method="POST" enctype="multipart/form-data"> 
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
<th>Teacher</th>
<th>Email</th>
<th>Subject</th>
<th>Course Code</th>
<th>Program</th>
<th>Section</th>
<th>Batch</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    <?php  $getAsssingCoursesList = $database->getDataList("Select *from assgincourses");
    if($getAsssingCoursesList){
        while($courseRow=$getAsssingCoursesList->fetch_assoc()){
            
 
?>
<tr>
<td><?php echo $courseRow['name']; ?></td>
<td class="center"><?php echo $courseRow['email']; ?></td>

<?php
        $code = $courseRow['code'];
$courseName = $database->getDataList("select *from courses where  code='$code'");
if($courseName){
    $courseNameRow=$courseName->fetch_assoc();
?>
<td class="center">
<?php echo $courseNameRow['name']; ?>
</td>
<?php }?>
<td class="center">
<?php echo $courseRow['code']; ?>
</td>
<?php   $program = $courseRow['program'];
$programName = $database->getDataList("select *from programs where  id='$program'");
if($programName){
    $programNameRow=$programName->fetch_assoc();
?>
<td class="center"> <?php echo $programNameRow['programs']; ?></td><?php }?>
<?php   $section = $courseRow['section'];
$sectionName = $database->getDataList("select *from sections where  id='$section'");
if($sectionName){
    $sectionNameRow=$sectionName->fetch_assoc();
?>
<td class="center"><?php  echo $sectionNameRow['sections'];?></td><?php } ?>
<td class="center"><?php echo $courseRow['batch']; ?></td>
<td class="center"><a href="ViewAssignCourses.php?id=<?php echo $courseRow['id']; ?>" class="label-default label label-danger">Delete</a></td>
</tr>
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
<?php include_once 'includes/footer.php'; } ?>