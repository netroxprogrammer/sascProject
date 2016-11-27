<?php session_start();  ?>

<?php
if(isset($_SESSION['email']) && isset($_SESSION['userId']) &&
isset($_SESSION['userRole']) && $_SESSION['userRole']=="coordinator"){
     include_once 'includes/header.php' ;
include_once '../config/config.php';  
include_once '../libraries/database.php'; 
$database = new Database();
if(isset($_POST['upload'])){
    if(isset($_FILES['uploaded_file'])){
         $name = $_FILES['uploaded_file']['name'];
        $mime = $_FILES['uploaded_file']['type'];
        $data = $_FILES  ['uploaded_file']['tmp_name'];
        $size = intval($_FILES['uploaded_file']['size']);
        $query = "INSERT INTO file(name,mime,size,data,created) VALUES ('$name','$mime','$size','$data', NOW())";
       $uploadImage =  $database->addUserData($query);
       if($uploadImage){
           ?>
<script>
window.location="uploadDateSheet.php?message=File Upload Successfully";
</script>
       <?php
       }else{
                 ?>
<script>
window.location="uploadDateSheet.php?message=Sorry File Not Upload";
</script>
       <?php
       }
    }
}

?>

<div class="row">
    <h3> Add News</h3><hr>
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
       <form method="POST" enctype="multipart/form-data"> 
    <!--  Select Subject Name -->
<div class="box col-md-9">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Upload File</h2>

</div>
<div class="box-content">
<div class="row">
   
    <div class="col-md-12">
       
               <input type="file" name="uploaded_file"><br>
        <input type="submit" name="upload" value="Upload file">
</div>
</div>
</div>
</div>
</div>
     
    <!--  End Row-->
</div>
<?php  include_once 'includes/footer.php'; }
?>