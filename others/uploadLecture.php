<?php session_start();  ?>

<?php
if(isset($_SESSION['email']) && isset($_SESSION['userId']) &&
isset($_SESSION['userRole']) && $_SESSION['userRole']=="teacher"){
     include_once 'includes/header.php' ;
include_once '../config/config.php';  
include_once '../libraries/database.php'; 
$database = new Database();
if(isset($_POST['upload'])){
    if(isset($_POST['title']) && !empty($_POST['title'])
            && isset($_POST['select_courses']) && !empty($_POST['select_courses'])
            && isset($_POST['select_program']) && !empty($_POST['select_program'])
            && isset($_POST['select_batch']) && !empty($_POST['select_batch'])
            && isset($_POST['semester']) && !empty($_POST['semester'])
            && isset($_POST['select_section']) && !empty($_POST['select_section'])
            && isset($_FILES['uploaded_file'])){
    $title = $_POST['title'];
    $subject = $_POST['select_courses'];
    $program = $_POST['select_program'];
    $batch = $_POST['select_batch'];
    $semester = $_POST['semester'];
    $section = $_POST['select_section'];
    $teacherId = $_SESSION['userId'];
    $name = $_FILES['uploaded_file']['name'];
    $mime = $_FILES['uploaded_file']['type'];
    $data = $_FILES  ['uploaded_file']['tmp_name'];
    $size = intval($_FILES['uploaded_file']['size']);
    $addLectureQuery = "insert into uplaodlecture(title,subject,program,batch,semester,section,"
            . "lecture,name,mime,size,created,teacherId) values("
            . "'$title','$subject','$program','$batch','$semester','$section','$data','$name',"
            . "'$mime','$size',NOW(),'$teacherId')";
          $uploadLecture = $database->addUserData($addLectureQuery);
          if($uploadLecture){
       
    ?>
<script>
window.location="uploadLecture.php?message=Lecture Uploaded Successfully";
</script>
       <?php
       }else{
                 ?>
<script>
window.location="uploadLecture.php?message=Sorry Lecture Not Upload";
</script>
       <?php
       }
    }
}?>
<div class="row">
    <h3> Add News</h3><hr>
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
       <form method="POST" enctype="multipart/form-data"> 
           <!-- Add Title -->
           <div class="box col-md-9">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Title</h2>

</div>
<div class="box-content">
<div class="row">
   
    <div class="col-md-12">
        <input type="text" name="title" class="form-control" />
</div>
</div>
</div>
</div>
</div>
           <!-- Select Subject -->
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
    <!-- Semester  -->
     <div class="box col-md-2  col-md-offset-2">
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
    <!-- Uplaod Lecture -->
<div class="box col-md-7 col-md-offset-2 ">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Upload File</h2>

</div>
<div class="box-content">
<div class="row">
   
    <div class="col-md-12">
       
               <input type="file" name="uploaded_file"><br>
       
</div>
</div>
</div>
</div>
</div>
    <!-- Submited-->
     <div class="box col-md-2 col-md-offset-5">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Submit</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
        <center> <input type="submit" name="upload" class="btn btn-info btn-xs" value="Uplaod Lecture" /></center>
    </div>

</div>
</div>
</div>
           
</div>
    <!--  End Row-->
</div>


<?php } ?>