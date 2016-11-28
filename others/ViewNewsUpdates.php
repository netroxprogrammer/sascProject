<?php session_start();  ?>

<?php
if(isset($_SESSION['email']) && isset($_SESSION['userId']) &&
isset($_SESSION['userRole']) && $_SESSION['userRole']=="coordinator"){
     include_once 'includes/header.php' ;
include_once '../config/config.php';  
include_once '../libraries/database.php'; 
$database = new Database();


?>
<div class="row">
    <div class="box col-md-9">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-search"></i>Search</h2>

</div>
<div class="box-content">
<div class="row">
   
    <div class="col-md-4">
    
    <input type="text" class="form-control" name="searchassing" placeholder="Search"/>
    </div>
    <div class="col-md-4">
    <a href="" class="btn btn-success"/>Search</a>
    
    
</div>
</div>
</div>
</div>
    </div>
         <form method="POST" enctype="multipart/form-data"> 
    <!--  Select Subject Name -->
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
<th>No</th>
<th>Message</th>
<th>Batch</th>
<th>Time</th>
<th>Action</th>
</tr>
</thead>
<tbody>
  <?php  
  $updatesNEws = $database->getDataList("select *from updatenews");
  if($updatesNEws){
      while($newsRow =$updatesNEws->fetch_assoc()){?>
    <tr>
<td><?php echo $newsRow['id']; ?></td>
<td><?php echo $newsRow['newsMessage']; ?></td>
<td><?php echo $newsRow['status']; ?></td>
<td><?php echo $newsRow['time']; ?></td>
<td><a href="<?php echo $newsRow['id']; ?>" class="label-success label label-default">Edit</a>
<a href="<?php echo $newsRow['id']; ?>" class="label-default label label-danger">Delete</a>
</td>
<tr>
<?php      }
  }
  
  ?>
    
</tbody>
    </table>
    </div>
</div>
</div>
</div>
</div>
     
    <!--  End Row-->
</div>
<?php include_once 'includes/footer.php'; } ?>