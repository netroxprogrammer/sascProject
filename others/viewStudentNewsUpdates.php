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
 if(isset($_GET['id'])){
   $id= $_GET['id'];
   $database->updateData("delete from studentnewsupdates  where id='$id' ");
  ?>
<script>
window.location="viewStudentNewsUpdates.php?select_batch=<?php echo $_SESSION['select_batch']; ?>&\n\
semester=<?php echo $_SESSION['semester']; ?>&select_program=<?php echo $_SESSION['select_program']; ?>&select_section=<?php echo $_SESSION['select_section']; ?>&searchNews=Search+News";
</script>
<?php
}


        if(isset($_GET['select_batch']) && 
        isset($_GET['semester']) &&
        isset($_GET['select_program']) && 
        isset($_GET['select_section'])){
            
        $batch = $_GET['select_batch'];
        $semester = $_GET['semester'];
        $program = $_GET['select_program'];
        $section = $_GET['select_section'];
        $_SESSION['select_batch'] = $batch;
        $_SESSION['semester'] = $semester;
        $_SESSION['select_program'] = $program;
        $_SESSION['select_section'] = $section;
       
       
 

    
    
?>
<div class="box col-md-9">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>View News Updates</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
<thead>
<tr>

<th>Title</th>
<th>Description</th>
<th>Program</th>
<th>Section</th>
<th>Batch</th>

<th>Semester</th>
<th>Action</th>
</tr>
</thead>
<tbody> 
    
    <?php 
    $teacherId = $_SESSION['userId'];
    $getQuizDetails = "select *from studentnewsupdates where batch='$batch' AND semester='$semester' AND program='$program' "
            . "AND section='$section' AND teacherId='$teacherId'";
    $getfromTable= $database->getDataList($getQuizDetails);
    if($getfromTable){
      while($quizRow=$getfromTable->fetch_assoc()){
          ?>
    <tr>
         <th><?php echo $quizRow['title']; ?></th> 
          <th><?php echo $quizRow['descreption']; ?></th> 
           <?php  
           
           // find Program Name
           $getProgram =  $quizRow['program'];
           $program = $database->getDataList("select *from programs where id='$getProgram'");
           if($program){
               $programRow = $program->fetch_assoc();
               ?>
         <th><?php echo $programRow['programs']; ?></th> 
        <?php
           }
           
           ?>   
               
            <?php // Find Section Name
            $section = $quizRow['section'];
            $getsections = $database->getDataList("select *from sections");
            if($getsections){
                $sectionRow = $getsections->fetch_assoc();
                ?>
          <th><?php echo $sectionRow['sections']; ?></th> 
          <?php  }
            
            ?>
             <th><?php echo $quizRow['batch']; ?></th> 
          
         
              
                 <th><?php echo $quizRow['semester']; ?></th>
              
                <td class="center">
                    
                    <a href="viewStudentNewsUpdates.php?id=<?php echo $quizRow['id']; ?>" class="label-default label label-danger">Delete</a></td>
      
       </tr> 
   
<?php
      }
    } ?>
</tbody>
    </table>
    </div>
</div>
</div>
</div>
</div>
<?php  //}
}
}?>