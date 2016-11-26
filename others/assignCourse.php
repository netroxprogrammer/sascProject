<?php session_start();  ?>

<?php
if(isset($_SESSION['email']) && isset($_SESSION['userId']) &&
isset($_SESSION['userRole']) && $_SESSION['userRole']=="coordinator"){
     include_once 'includes/header.php' ;
include_once '../config/config.php';  
include_once '../libraries/database.php';  
$database = new Database();
$programs = "select *from programs";
if(isset($_POST['add'])){
   
    if(isset($_POST['select_program']) || !empty($_POST['select_program']) && 
           isset($_POST['select_name']) ||  !empty($_POST['select_name']) &&
            isset($_POST['email']) || !empty($_POST['email']) && 
            isset($_POST['select_courses']) || !empty($_POST['select_courses']) && 
            isset($_POST['select_code']) || !empty($_POST['select_code']) &&
            isset($_POST['select_section']) || !empty($_POST['select_section']) &&
            isset($_POST['batch']) || !empty($_POST['batch'])
            ){
        $userId = $_SESSION['userId'];
        $selectProgram = $_POST['select_program'];
        $selectName = $_POST['select_name'];
        $selectEmail = $_POST['email'];
        $selectCourses = $_POST['select_courses'];
        $selectCode  = $_POST['select_code'];
        $selectSection  = $_POST['select_section'];
        $selectBatch  = $_POST['batch'];
       $addCourse = "insert  into  assgincourses(userId,program,name,email,courses,code,section,batch) values("
               . "'$userId','$selectProgram','$selectName','$selectEmail','$selectCourses','$selectCode','$selectSection','$selectBatch')";
        $insert = $database->addUserData($addCourse);
        if($insert){
           ?> 
<script>

window.location = "assignCourse.php?message=course add Successfully";
</script>
             <?php
        }
        else{?>
<script>

window.location = "assignCourse.php?message=Sorry course not add Try Again";
</script>
       
       <?php }
    }
}



?>
<div class="row">
    <h3> Assign courses to teacher</h3><hr>
    <div class="box col-md-8">
    <?php 
     if(isset($_GET['message'])){ ?>
         <div class="box-content alerts">
<div class="alert alert-danger">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong><?php echo $_GET['message']; ?>!</strong> 
</div></div>
     <?php 
      
         }
    
    ?>
    </div>
     <form method="post"> 
    <!--  Select Program Box -->
<div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i> Select Program</h2>

</div>
<div class="box-content">
<div class="row">
   
    <div class="col-md-12">
        <?php 
        
        $getprgrams = $database->getDataList($programs);
        ?>
        <select class="form-control" name="select_program" id ="program" >
            <option></option>
        <?php if($getprgrams)
        {
            while($programRows = $getprgrams->fetch_assoc()){
        ?>    
            <option value="<?php echo $programRows['id']; ?>"> <?php echo $programRows['programs']; ?></option>
        <?php 
            }
            } ?>
        </select>
              <input type="hidden" name="hiddenProgram" id="hiddenProgram" />
    </div>

</div>
</div>
</div>
</div>
    <!--  Select Teacher Name -->
    <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i> Select Teacher</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
        
        <?php
        
      
        $getTeachers = $database->getDataList("select *from users where  userRole='teacher'" ) ?>
        
        <select class="form-control" name="select_name">
            <option></option>
          <?php   if($getTeachers){  ?>
            <?php  while($teacherRow=$getTeachers->fetch_assoc()) { ?>
            <option value="<?php echo  $teacherRow['firstName']." ".$teacherRow['lastName']; ?>"><?php echo  $teacherRow['firstName']." ".$teacherRow['lastName']; ?></option>
            <?php }
          } ?>
        </select>
        
    </div>

</div>
</div>
</div>
</div>
    <!--  Select Teacher Name -->
       <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Teacher Email</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
        
        <?php
        
      
        $getTeachers = $database->getDataList("select  *from users where  userRole='teacher'" ) ?>
        
        <select class="form-control" name="email">
            <option></option>
          <?php   if($getTeachers){  ?>
            <?php  while($teacherRow=$getTeachers->fetch_assoc()) { ?>
            <option value="<?php   echo $teacherRow['userEmail']; ?>"><?php echo  $teacherRow['userEmail']; ?></option>
            <?php }
          } ?>
        </select>
        
    </div>

</div>
</div>
</div>
           
</div>
      <!--  Course Name  -->
       <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Course Name</h2>

</div>
   
<div class="box-content">
<div class="row">
    <div class="col-md-12">
        <select class="form-control" name="select_courses">
            <?php
             $getcourses = $database->getDataList("select *from courses");
             if($getcourses){
                 while ($courseRow= $getcourses->fetch_assoc()){
             ?> 
            <option value="<?php  echo $courseRow['code'];  ?>"><?php echo $courseRow['name']; ?> </option>
             <?php } }?>
        </select>
</div>
</div>
</div>
</div>
           
</div>
       <!--  Course Code  -->
       <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Course Code</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
      <select class="form-control" name="select_code">
            <?php
             $getcourses = $database->getDataList("select *from courses");
             if($getcourses){
                 while ($courseRow= $getcourses->fetch_assoc()){
             ?> 
            <option value="<?php  echo $courseRow['code'];  ?>"><?php echo $courseRow['code']; ?> </option>
             <?php } }?>
        </select>
    </div>

</div>
</div>
</div>
           
</div>
    
     <!--  Class Section  -->
       <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Class Section</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
      <select class="form-control" name="select_section">
            <?php
             $getsections = $database->getDataList("select *from sections");
             if($getsections){
                 while ($sectionRow= $getsections->fetch_assoc()){
             ?> 
            <option value="<?php  echo $sectionRow['id'];  ?>"><?php echo $sectionRow['sections']; ?> </option>
             <?php } }?>
        </select>
    </div>

</div>
</div>
</div>
           
</div>
      <!--  Class Section  -->
       <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Batch</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
      <select class="form-control" name="batch">
           <?php
             $getbatch = $database->getDataList("select *from batch");
             if($getbatch){
                 while ($getbatchRow= $getbatch->fetch_assoc()){
             ?> 
            <option value="<?php  echo $getbatchRow['id'];  ?>"><?php echo $getbatchRow['batch']; ?> </option>
             <?php } }?>
        </select>
    </div>

</div>
</div>
</div>
           
</div>
      
       <!--  Submission  -->
       <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Actions</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
        <center>   <input  type="submit" class="btn btn-info btn-xs" name="add" value="Save & New">
        </center>
    </div>

</div>
</div>
</div>
     
</div>
          </form>
      
    
</div>

<?php include_once "includes/footer.php" ?>
<?php }
else{
   ?>
<script>

window.location = "../logout.php";
</script>
<?php }?>