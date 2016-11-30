<?php session_start();  ?>

<?php
if(isset($_SESSION['email']) && isset($_SESSION['userId']) &&
isset($_SESSION['userRole']) && $_SESSION['userRole']=="teacher"){
     include_once 'includes/header.php' ;
include_once '../config/config.php';  
include_once '../libraries/database.php'; 
$database = new Database();

        $email = $_SESSION['email'];
        
        $getMyCourses  = "Select *from assgincourses  where email='$email'";
        $getCourses = $database->getDataList($getMyCourses);
       

?>
<div class="row">
 
         <form method="POST" > 
    <!--  Select Subject Name -->
<div class="box col-md-9">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>My Courses</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
<thead>
<tr>
<th>Coordinator Name</th>
<th>Subject</th>
<th>Program</th>
<th>Batch</th>
<th>Section</th>
</tr>
</thead>
<tbody>
   <?php  
    if($getCourses){
            while($CoursesRow = $getCourses->fetch_assoc()){ ?> 
    <tr>
        <?php
        $userId = $CoursesRow['userId'];
        $getUserName = $database->getDataList("select *from users where userId='$userId'");
        if($getUserName){
            $userRow = $getUserName->fetch_assoc();?>
            
     
        <td> <?php  echo $userRow['firstName']." ".$userRow['lastName'];?></td>
        <?php    }
        ?>
        <?php  
        $subject = $CoursesRow['courses'];
       $getSubject = $database->getDataList("select *from courses where  code='$subject'");
       if($getSubject){
           $getsubjectRow = $getSubject->fetch_assoc();
           ?>
        <th><?php  echo $getsubjectRow['name']; ?></th>
        <?php
          }
          $program = $CoursesRow['program'];
          $getprogram = $database->getDataList("select *from programs where id='$program'");
          if($getprogram){
              $programRow = $getprogram->fetch_assoc();
              
             ?>
        <th><?php echo $programRow['programs'];  ?> </th>
         <?php }
        ?>
        <th> <?php echo $CoursesRow['batch']; ?></th>
       
        <?php 
        $section = $CoursesRow['section'];
        $getSection = $database->getDataList("select *from  sections where id='$section'");
       if($getSection){
           $sectionRow  = $getSection->fetch_assoc();
           ?>
        <th> <?php echo $sectionRow['sections']; ?></th>
        <?php
       }
        
        ?>
      
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