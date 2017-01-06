<?php session_start();  ?>

<?php
if(isset($_SESSION['email']) && isset($_SESSION['userId']) &&
isset($_SESSION['userRole']) && $_SESSION['userRole']=="coordinator"){
     include_once 'includes/header.php' ;
include_once '../config/config.php';  
include_once '../libraries/database.php'; 
$database = new Database();
if(isset($_GET['id'])){
   $id= $_GET['id'];
   $database->updateData("delete from updatenews  where id='$id' ");
  ?>
<script>
window.location="ViewNewsUpdates.php";
</script>
<?php
}




?>
<div class="row">
    <div class="box col-md-9">

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
<td>
    <a href="ViewNewsUpdates.php?id=<?php echo $newsRow['id']; ?>" class="label-default label label-danger">Delete</a>
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