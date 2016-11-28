<?php session_start(); ?>

<?php
if(!isset($_SESSION['email']) && !isset($_SESSION['userId']) &&
!isset($_SESSION['userRole']) && $_SESSION['userRole']!="teacher"){
?>
<script>
window.location ="../logout.php";
</script>


<?php }
else{
    
    ?>
<?php include_once 'includes/header.php' ?>
<div class=" row">
    <!--   Assign Course Block -->
<div class="col-md-3 col-sm-3 col-xs-6">
<a data-toggle="tooltip" class="well top-block" href="addQuizMarks.php">
<i class="glyphicon glyphicon-user blue"></i>
<div>Add Quiz</div>
<div>Marks</div>

</a>
</div>
    <!-- Upload Time Table Block-->
    
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="uploadTimeTable.php">
<i class="glyphicon glyphicon-list-alt blue"></i>
<div>Upload Time Table</div>
<div>Teachers/Students</div>

</a>
</div>
    <!-- Add News-->
    
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="NewsUpdates.php">
<i class=" glyphicon glyphicon-globe blue"></i>
<div>Add News</div>
<div>For All</div>

</a>
</div>
     <!-- uplaod Date Sheet-->
    
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="uploadDateSheet.php">
<i class=" glyphicon glyphicon-edit blue"></i>
<div>Upload Date</div>
<div>Sheet</div>

</a>
</div>
    <!-- View Assign Course-->
    
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="ViewAssignCourses.php">
<i class="	glyphicon glyphicon-link blue"></i>
<div>View Assign</div>
<div>Courses</div>

</a>
</div>
     <!-- View Time Table -->
    
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="ViewTimeTable.php">
<i class="glyphicon glyphicon-calendar blue"></i>
<div>View Time</div>
<div>Table</div>

</a>
</div>
    
     <!-- View News Updates -->
    
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="ViewNewsUpdates.php">
<i class="	glyphicon glyphicon-modal-window blue"></i>
<div>View News</div>
<div>Updates</div>

</a>
</div>
      <!-- View Date Sheets -->
    
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="ViewDateSheets.php">
<i class=" glyphicon glyphicon-edit blue"></i>
<div>View Date</div>
<div>Sheets</div>

</a>
</div>
     
</div>
<?php include_once 'includes/footer.php'; ?>
 <?php }?>