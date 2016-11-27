<?php session_start();  ?>

<?php
if(isset($_SESSION['email']) && isset($_SESSION['userId']) &&
isset($_SESSION['userRole']) && $_SESSION['userRole']=="coordinator"){
     include_once 'includes/header.php' ;
include_once '../config/config.php';  
include_once '../libraries/database.php'; 
$database = new Database();
if(isset($_POST['addtimetable'])){

    if(isset($_POST['select_courses']) || !empty($_POST['select_courses'])
          
            && isset($_POST['class_time']) || !empty($_POST['class_time'])
            && isset($_POST['select_program']) || !empty($_POST['select_program'])
            && isset($_POST['select_section']) || !empty($_POST['select_section'])
            && isset($_POST['select_batch']) || !empty($_POST['select_batch'])
             && isset($_POST['select_className']) || !empty($_POST['select_className'])
             && isset($_POST['select_day']) || !empty($_POST['select_day'])
            ){
        
     $selectCourse =  $_POST['select_courses'];
     $classTime =  $_POST['class_time'];
     $selectProgram = $_POST['select_program'];
     $selectSection =  $_POST['select_section'];
     $selectBatch =  $_POST['select_batch'];
     $selectClassName =  $_POST['select_className'];
     $selectDay =$_POST['select_day'];
     $userId = $_SESSION['userId'];
     $teachers = "select *from  assgincourses  where program='$selectProgram' AND section='$selectSection' AND code='$selectCourse' AND batch='$selectBatch'";
     $findTeacher = $database->getDataList($teachers);
     if($findTeacher){    
      $techerRows = $findTeacher->fetch_assoc();
      $teacherEmail = $techerRows['email'];
    
      $teacherName = $techerRows['name'];
     $findusers = "select *from  users where userEmail='$teacherEmail' AND userRole='teacher'";
         $findteach  = $database->getDataList($findusers);
     
     if($findteach){
         $teachersRow = $findteach->fetch_assoc();
     $teaName= $teachersRow['firstName']." ".$teachersRow['lastName'];
     $teacherId = $teachersRow['userId'];
     $insertTimeTable = "insert  into uplaodtimetable(userId,subject,code,classTime,className,teacher,teacherId,batch,section,program,day) "
                    . "values('$userId','$selectCourse','$selectCourse','$classTime','$selectClassName','$teacherName','$teacherId','$selectBatch','$selectSection','$selectProgram','$selectDay')";
            $uploadTimeTable = $database->addUserData($insertTimeTable);
            if($uploadTimeTable){?>
<SCRIPT>
window.location="uploadTimeTable.php?message=Time Table Successfullly uploaded";
</script>
<?php

            }else{
                ?>
           
<SCRIPT>
window.location="uploadTimeTable.php?message=Sorry Time Table not Uplaoded";
</script>
              
            <?php
            
            }
     }
     else{?>
<SCRIPT>
window.location="uploadTimeTable.php?message=Sorry  Teacher Not Found";
</script>
    <?php }
     }
     else{?>
          <SCRIPT>
window.location="uploadTimeTable.php?message=Sorry Courses Information not match";
</script>

         
    <?php  }
}
}


?>
<div class="row">
    <h3> Upload Time Table</h3><hr>
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
    <!--  Select Subject Name -->
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
    <!--  Select Time -->
    <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i> Class Time</h2>

</div>
<div class="box-content">
<div class="row">
   
    <div class="col-md-12">
 
                <div class='input-group date'>
                    <input type='text' name="class_time" class="form-control" placeholder="00:00 PM" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time">
                            
                        </span>
                    </span>
                </div>
           
        </div>
      </div>
    </div>
    </div>
    </div>
    <!-- select Day  -->
    <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i> Select Day</h2>

</div>
<div class="box-content">
<div class="row">
   
    <div class="col-md-12">
        <?php  $day = $database->getDataList("select *from  weakdays"); ?>
        <select class="form-control" name="select_day">
              <?php if($day) {
     while ($dayRows = $day->fetch_assoc()){
                  ?>
            
                     <option value="<?php echo $dayRows['id'];?>"><?php echo $dayRows['name']; ?></option>
        
                      <?php }
              }
              ?>
                     </select>
        </div>
      </div>
    </div>
    </div>
    </div>
       <!--  Select Class Names -->
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
    
           <!--  Select Batch -->
    <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Select Batch</h2>

</div>
<div class="box-content">
<div class="row">
   
    <div class="col-md-12">
        <select class="form-control" name="select_batch">
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
           <!--  Select Class Name -->
    <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Class Name</h2>

</div>
<div class="box-content">
<div class="row">
   
    <div class="col-md-12">
       <select class="form-control" name="select_className">
           <option></option>
            <?php
             $getsections = $database->getDataList("select *from classnames");
             if($getsections){
                 while ($sectionRow= $getsections->fetch_assoc()){
             ?> 
            <option value="<?php  echo $sectionRow['id'];  ?>"><?php echo $sectionRow['className']; ?> </option>
             <?php } }?>
        </select>        </div>
      </div>
    </div>
    </div>
    </div>
          <!--  Select section -->
    <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Select Course</h2>

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
        </select>        </div>
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
        <center>   <input  type="submit" class="btn btn-info btn-xs" name="addtimetable" value="Save & New">
        </center>
    </div>

</div>
</div>
</div>
     
</div>
          </form>
 
   
        
    
    
    
    
</div>   
<?php  include_once 'includes/footer.php'; }else{
    ?>
              
<SCRIPT>
window.location="../logout.php";
</script>
<?php
}
?>
