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
   
    
    
    ?>
<div class="row">
    <h3>Search News Updates</h3><hr>
    
    <!-- News  Title  -->
    <form action ="viewStudentNewsUpdates.php" method="get">
    
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
     
      <!-- Quiz Total Marks  -->
       <div class="box col-md-2 col-md-offset-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Submit</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
        <center> <input type="submit" name="searchNews" class="btn btn-info btn-xs" value="Search News" /></center>
    </div>

</div>
</div>
</div>
           
</div>
    </form>     
    <!-- End Row -->
      </div> 

  <?php  } ?>