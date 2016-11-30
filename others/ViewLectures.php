<?php session_start();  ?>

<?php
if(isset($_SESSION['email']) && isset($_SESSION['userId']) &&
isset($_SESSION['userRole']) && $_SESSION['userRole']=="teacher"){
     include_once 'includes/header.php' ;
include_once '../config/config.php';  
include_once '../libraries/database.php'; 
$database = new Database();

    
        $batch = $_GET['select_batch'];
       
        $program = $_GET['select_program'];
        $section = $_GET['select_section'];
        $getQeury = "Select *from uplaodlecture where batch='$batch'  AND program='$program' AND section='$section'";
        $getLectures = $database->getDataList($getQeury);
       

?>
<div class="row">
 
         <form method="POST" > 
    <!--  Select Subject Name -->
<div class="box col-md-9">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>View Uploaded Lecture</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
<thead>
<tr>
<th>Title</th>
<th>Subject</th>
<th>Program</th>
<th>Batch</th>
<th>Semester</th>
<th>Section</th>
<th>Lecture</th>
</tr>
</thead>
<tbody>
   <?php  
    if($getLectures){
            while($lectureRow = $getLectures->fetch_assoc()){ ?> 
    <tr>
        <td> <?php  echo $lectureRow['title'];?></td>
        <?php  
        $subject = $lectureRow['subject'];
       $getSubject = $database->getDataList("select *from courses where  code='$subject'");
       if($getSubject){
           $getsubjectRow = $getSubject->fetch_assoc();
           ?>
        <th><?php  echo $getsubjectRow['name']; ?></th>
        <?php
          }
          $program = $lectureRow['program'];
          $getprogram = $database->getDataList("select *from programs where id='$program'");
          if($getprogram){
              $programRow = $getprogram->fetch_assoc();
              
             ?>
        <th><?php echo $programRow['programs'];  ?> </th>
         <?php }
        ?>
        <th> <?php echo $lectureRow['batch']; ?></th>
        <th> <?php echo $lectureRow['semester']; ?></th>
        <?php 
        $section = $lectureRow['section'];
        $getSection = $database->getDataList("select *from  sections where id='$section'");
       if($getSection){
           $sectionRow  = $getSection->fetch_assoc();
           ?>
        <th> <?php echo $sectionRow['sections']; ?></th>
        <?php
       }
        
        ?>
        <th><a href="Downloadlecture.php?id=<?php echo $lectureRow['id']; ?>" > Download</a>  </th>
   
    </tr>
    <?php   } 
        } ?>
</tbody>
    </table>
    </div>
</div>
</div>
</div>
</div>
     
    <!--  End Row-->
</div>
<?php include_once 'includes/footer.php'; 
           
}?>