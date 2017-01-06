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
if(isset($_GET['quizid'])){
   $quizid= $_GET['quizid'];
   $database->updateData("delete from addquizmarks  where quizId='$quizid' ");
  ?>
<script>
window.location="viewQuizMarks.php?id=<?php echo $_SESSION['addId']; ?>";
</script>
<?php
}
?>
<div class="box col-md-9">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>View Quiz Marks</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
<thead>
<tr>

<th>Program</th>
<th>Section</th>
<th>Batch</th>
<th>Subject</th>
<th>Student Id</th>
<th>Semester</th>
<th>Quiz Marks</th>
<th>Total Marks</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    <?php 
    if(isset($_GET["id"])){
    $getstudentId = $_GET["id"];
    $_SESSION['addId']=$_GET["id"];
    $teacherId=$_SESSION['userId'];
    $getQuizDetails = "select *from addquizmarks where studentId='$getstudentId' AND  type='quiz' AND teacherId='$teacherId' ";
    $getfromTable= $database->getDataList($getQuizDetails);
    if($getfromTable){
      while($quizRow=$getfromTable->fetch_assoc()){
          ?>
    <tr>
        
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
          <?php 
              // find Subject
          $code = $quizRow['subject'];
          $getSubject = $database->getDataList("select *from courses where code='$code'");
          if($getSubject){
              $subjectRow = $getSubject->fetch_assoc();
              ?>
               <th><?php echo $subjectRow['name']; ?></th> 
         <?php } ?>
                <th><?php echo $quizRow['studentId']; ?></th> 
                 <th><?php echo $quizRow['semester']; ?></th>
               <th><?php echo $quizRow['quizMarks']; ?></th> 
                <th><?php echo $quizRow['totalQuizMarks']; ?></th>
                <td class="center">
                    <a href="viewQuizMarks.php?quizid=<?php echo $quizRow['quizId'];?>" class="label-default label label-danger">Delete</a></td>
      
       </tr> 
   
<?php
      }
    }
    }?>
</tbody>
    </table>
    </div>
</div>
</div>
</div>
</div>
<?php  } ?>