<?php session_start(); ?>

<?php
if(!isset($_SESSION['email']) && !isset($_SESSION['userId']) &&
!isset($_SESSION['userRole']) && $_SESSION['userRole']!="student"){
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
<a data-toggle="tooltip" class="well top-block" href="sMyTimeTable.php">
<i class="glyphicon glyphicon-user blue"></i>
<div>My</div>
<div>TimeTable</div>

</a>
</div>
    <!-- Upload Time Table Block-->
    
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="sReadCoodinatorNews.php">
<i class="glyphicon glyphicon-list-alt blue"></i>
<div>Read Coordinator</div>
<div>News</div>

</a>
</div>
    <!-- Add News-->
    
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="sReaadTeacherNews.php">
<i class=" glyphicon glyphicon-globe blue"></i>
<div>Read Teacher</div>
<div>News</div>

</a>
</div>
     <!-- uplaod Date Sheet-->
    
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="sViewQuizMarks.php">
<i class=" glyphicon glyphicon-edit blue"></i>
<div>View Quiz</div>
<div>Marks</div>

</a>
</div>
    <!-- View Assign Course-->
    
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="sViewMidMarks.php">
<i class="	glyphicon glyphicon-link blue"></i>
<div>View Mid Term</div>
<div>Marks</div>

</a>
</div>
     <!-- View Time Table -->
    
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="sViewFinalMarks.php">
<i class="glyphicon glyphicon-calendar blue"></i>
<div>View Final Term</div>
<div>Marks</div>

</a>
</div>
    
     <!-- View News Updates -->
    
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="sMyLectures.php">
<i class="	glyphicon glyphicon-modal-window blue"></i>
<div>My</div>
<div>Lectures</div>

</a>
</div>
      
     
</div>
<?php include_once 'includes/footer.php'; ?>
 <?php }?>