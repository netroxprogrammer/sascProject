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
<?php include_once 'includes/header.php';
include_once '../config/config.php';
include_once '../libraries/database.php'; 



$database = new Database();
if(isset($_POST['searchStudent']))
{
    if(isset($_POST['studentId']) && !empty($_POST['studentId'])){
        $studentId = $_POST['studentId'];?>
<script>
window.location="viewQuizMarks.php?id=<?php echo $studentId; ?>";
</script>
      
    <?php
    
    }
    
}

if(isset($_POST['searchStudentmid']))
{
    if(isset($_POST['studentIdmid']) && !empty($_POST['studentIdmid'])){
        $studentId = $_POST['studentIdmid'];?>
<script>
window.location="viewMidMarks.php?id=<?php echo $studentId; ?>";
</script>
      
   <?php }
    
}
if(isset($_POST['searchStudentfinal']))
{
    if(isset($_POST['studentIdfinal']) && !empty($_POST['studentIdfinal'])){
        $studentId = $_POST['studentIdfinal'];?>
<script>
window.location="viewFinalMarks.php?id=<?php echo $studentId; ?>";
</script>
      
   <?php }
    
}
?>




<div class=" row">
   <div class="box col-md-4">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Search Quiz Marks</h2>

</div>
<div class="box-content">
<div class="row">
   <form action="" method="post">
    <div class="col-md-8">
        
        <label>Student Id</label>
        <input type="text" name="studentId" class="form-control"  />
            <center> <input type="submit"  name="searchStudent" class="btn btn-info btn-xs" value="Search" /></center>
</div>
    <div class="col-md-2">
        <br>
        <center> <a href="viewAllQuizMarks.php"  class="btn btn-info btn-xs " >View Complete</a></center>
</div>
   </form>
</div>
</div>
</div>
</div>
   <!-- Add Mid Marks--> 
   <div class="box col-md-4">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Search Mid Term Marks</h2>

</div>
<div class="box-content">
<div class="row">
   <form action="" method="post">
    <div class="col-md-8">
        
        <label>Student Id</label>
        <input type="text" name="studentIdmid" class="form-control"  />
            <center> <input type="submit"  name="searchStudentmid" class="btn btn-info btn-xs" value="Search" /></center>
</div>
    <div class="col-md-3">
        <br>
    
        <center> <a href="viewAllMidMarks.php"  class="btn btn-info  btn-xs" >View Complete</a></center>
</div>
   </form>
</div>
</div>
</div>
</div>
   <!-- Add Final Marks --> 
   <div class="box col-md-4">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Search Final Term Marks</h2>

</div>
<div class="box-content">
<div class="row">
   <form action="" method="post">
    <div class="col-md-8">
        
        <label>Student Id</label>
        <input type="text" name="studentIdfinal" class="form-control"  />
            <center> <input type="submit"  name="searchStudentfinal" class="btn btn-info btn-xs" value="Search" /></center>
</div>
    <div class="col-md-3">
        <br>
        
        <center> <a href="viewAllFinalMarks.php"  class="btn btn-info  btn-xs " >View Complete</a></center>
</div>
   </form>
</div>
</div>
</div>
</div>
   
   
</div>
<?php include_once 'includes/footer.php'; ?>
 <?php }?>