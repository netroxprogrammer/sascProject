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
   
         <form method="POST" enctype="multipart/form-data"> 
    <!--  Select Subject Name -->
<div class="box col-md-9">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>View Date Sheets</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
<thead>
<tr>
<th>No</th>
<th>File Name</th>
<th>File Type</th>
<th>Size</th>
<th>Download</th>
<th>Time</th>
<th>Action</th>
</tr>
</thead>
<tbody>
  <?php  
  $updatesNEws = $database->getDataList("select *from file");
  if($updatesNEws){
      while($newsRow =$updatesNEws->fetch_assoc()){?>
    <tr>
<td><?php echo $newsRow['id']; ?></td>
<td><?php echo $newsRow['name']; ?></td>
<td><?php echo $newsRow['mime']; ?></td>
<td><?php echo $newsRow['size']; ?></td>

<td><a href="DownloadFile.php?id=<?php echo $newsRow['id']; ?>" class="label-info label label-default">Download</a></td>
<td><?php echo $newsRow['created']; ?></td>
<td><a href="<?php echo $newsRow['id']; ?>" class="label-success label label-default">Edit</a>
<a href="<?php echo $newsRow['id']; ?>" class="label-default label label-danger">Del</a>
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