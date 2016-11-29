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
    include_once 'includes/header.php' ;
include_once '../config/config.php';  
include_once '../libraries/database.php'; 
    include_once 'includes/header.php';
    $database = new Database();
    
    if(isset($_POST['quizMarks'])){
        if(isset($_POST['select_courses']) || !empty($_POST['select_courses'])
          && isset($_POST['select_program']) ||!empty($_POST['select_program'])
          && isset($_POST['select_batch']) ||!empty($_POST['select_batch'])
          && isset($_POST['select_section']) ||!empty($_POST['select_section'])
          && isset($_POST['studentId']) ||!empty($_POST['studentId'])
          && isset($_POST['quizMarks']) ||!empty($_POST['quizMarks'])
          && isset($_POST['quizTotalMarks']) ||!empty($_POST['quizTotalMarks'])
           && isset($_POST['semester']) ||!empty($_POST['semester'])      
                ){
       $select_subject = $_POST['select_courses'];
       $select_program= $_POST['select_program'];
       $select_batch = $_POST['select_batch'];
       $select_section = $_POST['select_section'];
       $studentId = $_POST['studentId'];
       $quizMarks = $_POST['quizMarks'];
       $quizTotalMarks = $_POST['quizTotalMarks'];
       $smesters = $_POST['semester'];
       $teacherId = $_SESSION['userId'];
       $addMarksQuery = "insert into  addquizmarks(program,section,batch,subject,studentId,quizMarks,totalQuizMarks,teacherId,type,semester) "
               . "values('$select_program','$select_section','$select_batch','$select_subject','$studentId','$quizMarks','$quizTotalMarks','$teacherId','mid','$smesters')";
       
       $addMarks = $database->addUserData($addMarksQuery);
       if($addMarks){
           ?>
<script> window.location="addQuizMarks.php?message= Marks Added"; </script>
<?php
       }
       else{?>
           <script> window.location="addQuizMarks.php?message=Sorry  Marks Not Added"; </script>
      <?php }
    }
    }
    
    
    ?>



<div class="row">
    <h3> Add Mid Term Marks</h3><hr>
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
    <form action="" method="post">
    <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i> Select Subject</h2>

</div>
<div class="box-content">
<div class="row">
   
    <div class="col-md-12">
        <?php 
        
        $getCourses = $database->getDataList("select *from courses");
        ?>
        <select class="form-control" name="select_courses" >
            <option></option>
        <?php if($getCourses)
        {
            while($coursesRows = $getCourses->fetch_assoc()){
        ?>    
            <option value="<?php echo $coursesRows['code']; ?>"> <?php echo $coursesRows['name']; ?></option>
        <?php 
            }
            } ?>
        </select>
              

</div>
</div>
</div>
</div>
</div>
    <!--  Select Program -->
     <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i> Select Program</h2>

</div>
<div class="box-content">
<div class="row">
   
    <div class="col-md-12">
        <?php  $programs = $database->getDataList("select *from  programs"); ?>
        <select class="form-control" name="select_program">
             <option></option>
              <?php if($programs) {
     while ($programsRows = $programs->fetch_assoc()){
                  ?>
            
                     <option value="<?php echo $programsRows['id'];?>"><?php echo $programsRows['programs']; ?></option>
        
                      <?php }
              }
              ?>
                     </select>
        </div>
      </div>
    </div>
    </div>
    </div>
    <!-- Select Batch -->
    <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Select Batch</h2>

</div>
<div class="box-content">
<div class="row">
   
    <div class="col-md-12">
        <select class="form-control" name="select_batch">
            <option></option>
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
          <option></option>
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
    
     <!-- add Student Id   -->
       <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Student id</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
        <input type="text" class="form-control" name="studentId" />
    </div>

</div>
</div>
</div>
           
</div>
     <!-- Semester  -->
     <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Semester</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
         <select class="form-control" name="semester">
          <option></option>
            <?php
             $getsections = $database->getDataList("select *from semester");
             if($getsections){
                 while ($sectionRow= $getsections->fetch_assoc()){
             ?> 
            <option value="<?php  echo $sectionRow['id'];  ?>"><?php echo $sectionRow['semester']; ?> </option>
             <?php } }?>
        </select>
    </div>

</div>
</div>
</div>
           
</div>
     <!-- Quiz Marks  -->
       <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Mid Marks</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
         <input type="text" class="form-control" name="quizMarks" />
    </div>

</div>
</div>
</div>
           
</div>
    
     <!-- Quiz Total Marks  -->
       <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Mid Total Marks</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
         <input type="text" class="form-control" name="quizTotalMarks" />
    </div>

</div>
</div>
</div>
           
</div>
      <!-- Quiz Total Marks  -->
       <div class="box col-md-2 col-md-offset-3">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Submit</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
        <center> <input type="submit" name="addMarks" class="btn btn-info btn-xs" value="Add Marks" /></center>
    </div>

</div>
</div>
</div>
           
</div>
      
</form>
    <!-- End Row-->
    </div>
<?php  }?>