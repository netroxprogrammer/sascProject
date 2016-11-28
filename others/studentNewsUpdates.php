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
    if(isset($_POST['addstudentNews'])){
        if(isset($_POST['title'])|| !empty($_POST['title'])
                && isset($_POST['select_batch']) && !empty($_POST['select_batch'])
                && isset($_POST['semester']) && empty($_POST['semester'])
                && isset($_POST['programs'])&&  !empty($_POST['programs'])
                && isset($_POST['select_section'])&& !empty($_POST['select_section'])
                && isset($_POST['news_message'])&& !empty($_POST['news_message'])){
        $title = $_POST['title'];
        $batch = $_POST['select_batch'];
        $semester = $_POST['semester'];
        $program = $_POST['select_program'];
        $section = $_POST['select_section'];
        $message = $_POST['news_message'];
        $teacherId = $_SESSION['userId'];
        $addQuery = "insert into studentnewsupdates(title,descreption,batch,semester,program,section,teacherId) "
                . " values('$title','$message','$batch','$semester','$program','$section','$teacherId')";
        $uploadMessge =$database->addUserData($addQuery);
        if($uploadMessge){
            ?>
<script>window.location="studentNewsUpdates.php?message= Messsage SuccessFully Updates";</script>
    <?php    } 
    else{?>
        <script>window.location="studentNewsUpdates.php?message= Sorry Messsage Not Updates";</script>
    <?php
    }
    }
    }
    
    ?>
<div class="row">
    <h3>Add Updates For Students</h3><hr>
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
    
    <!-- News  Title  -->
    <form action ="" method="post">
    <div class="box col-md-9">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Updates Title</h2>

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
     <div class="box col-md-9 col-md-offset-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Write News</h2>

</div>
<div class="box-content">
<div class="row">
   
    <div class="col-md-12">
       
              
<div class="form-group">
  <label for="comment">Comment:</label>
  <textarea class="form-control" rows="5"  name="news_message" id="comment"></textarea>
</div>
</div>
</div>
</div>
</div>
</div>
      <!-- Quiz Total Marks  -->
       <div class="box col-md-2 col-md-offset-5">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Submit</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
        <center> <input type="submit" name="addstudentNews" class="btn btn-info btn-xs" value="Add Updates" /></center>
    </div>

</div>
</div>
</div>
           
</div>
    </form>     
    <!-- End Row -->
      </div> 

  <?php  } ?>