<?php session_start();  ?>

<?php
if(isset($_SESSION['email']) && isset($_SESSION['userId']) &&
isset($_SESSION['userRole']) && $_SESSION['userRole']=="coordinator"){
     include_once 'includes/header.php' ;
include_once '../config/config.php';  
include_once '../libraries/database.php'; 
$database = new Database();
if(isset($_POST['addNews'])){
    if(isset($_POST['news_message']) || !empty($_POST['news_message'])
            && isset($_POST['select_Group']) || !empty($_POST['select_Group'])){
    $message = $_POST['news_message'];
    $group = $_POST['select_Group'];
    $userId = $_SESSION['userId'];
    $insertNews = "insert into updatenews(newsMessage,status,userId) values('$message','$group','$userId')";
    $saveNews = $database->addUserData($insertNews);
    if($saveNews){?>
                      
<SCRIPT>
window.location="NewsUpdates.php?message=News Update Sucessfully";
</script>
    <?php }else{ ?>
      <SCRIPT>
window.location="NewsUpdates.php?message=Sorry  News Not Update";
</script>
   <?php }
    }
    else{?>
        
       <SCRIPT>
window.location="NewsUpdates.php?message=Sorry! please Give Complete Information";
</script>
   <?php  }
   
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
    
     <form method="POST"> 
    <!--  Select Subject Name -->
<div class="box col-md-9">
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
    
    <!-- Select Group -->
    
    <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i> Select Group</h2>

</div>
<div class="box-content">
<div class="row">
   
    <div class="col-md-12">
        <?php  
             $getbatchs = $database->getDataList("select *from batch");
             
        ?>
        <select class="form-control" name="select_Group">
            <?php 
            while($batchRows = $getbatchs->fetch_assoc()){
            
            ?>
            <option value="<?php echo $batchRows['id']?>"><?php echo $batchRows['batch']?></option>
            <?php } ?>
        </select>

</div>
</div>
</div>
</div>
</div>
     
     <!--  Submission  -->
       <div class="box col-md-2">
<div class="box-inner">
<div class="box-header well" data-original-title="">
<h2><i class="glyphicon glyphicon-th"></i>Actions</h2>

</div>
<div class="box-content">
<div class="row">
    <div class="col-md-12">
        <center>   <input  type="submit" class="btn btn-info btn-xs" name="addNews" value="Save & New">
        </center>
    </div>

</div>
</div>
</div>
     
</div>
     
    
    
  <!--  END Row -->
     </form>
</div>
<?php  include_once 'includes/footer.php'; } ?>