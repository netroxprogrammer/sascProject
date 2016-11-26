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
<div class="col-md-3 col-sm-3 col-xs-6">
<a data-toggle="tooltip" class="well top-block" href="assignCourse.php">
<i class="glyphicon glyphicon-user blue"></i>
<div>Assign Courses</div>
<div>to Teachers</div>

</a>
</div>
</div>
<?php include_once 'includes/footer.php'; ?>
 <?php }?>