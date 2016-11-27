<?php session_start(); ?>

<?php
if(!isset($_SESSION['email']) && !isset($_SESSION['userId']) &&
!isset($_SESSION['userRole']) && !$_SESSION['userRole']=="coordinator"){
?>
<script>
window.location ="../logout.php";
</script>


<?php }
else{?>
<?php include_once 'includes/header.php' ?>
<div class=" row">
    <!--   Assign Course Block -->
<div class="col-md-3 col-sm-3 col-xs-6">
<a data-toggle="tooltip" class="well top-block" href="assignCourse.php">
<i class="glyphicon glyphicon-user blue"></i>
<div>Assign Courses</div>
<div>to Teachers</div>

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
    
    
</div>
<?php include_once 'includes/footer.php'; ?>
 <?php }?>