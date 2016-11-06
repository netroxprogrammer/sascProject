<?php session_start(); ?>
<?php include_once 'includes/header.php';  ?>
<?php include_once 'config/config.php';?>
<?php include_once 'libraries/Database.php';?>
<?php 
$database = new Database();

if(isset($_SESSION['email'])){
	$email  = $_SESSION['email'];
	$result = $database->isDataExist("select *from users where userEmail='$email'");
	if($result){
		if(isset($_POST['submit']) && isset($_POST['tokken'])){
			
			  $vemail = $_POST['vemail'];
			$result = $database->isDataExist("select *from users where userEmail='$vemail'");
			if($result){
				$userId=  $_SESSION['userId'];
				$tokken =  $_POST['tokken'];
				$str = "select *from emailverify where  userId='$userId' AND email = '$vemail' AND tokken='$tokken'";
				$isTokken = $database->isDataExist($str);
				if($isTokken){
					header("Location: profile.php");
				}
			}
			else{
				header("Location: verify.php?email=12344");
			}
		}
	
	

?>


<div class="container">
  <form class="form-horizontal" method="post">
  <div class="row well">
  <div col-sm-4>
  <center><b>Check Email for Verification</b></center>
  </div>
  </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email"><b>Email:</b></label>
      <div class="col-sm-10">
     
        <p class="form-control-static"><?php  echo $email; ?></p>
        <input type="hidden" value="<?php echo $email; ?>" name="vemail">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd"><b>Tokken:</b></label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="tokken" id="pwd" placeholder="Enter Tokken">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input  type="submit" class="btn btn-default" name="submit" >
      </div>
    </div>
  </form>
  <?php 
	}
	else{?>
		<center><b>Email Not Found Go back and  Register Again <a href="register.php">Back</a> </b></center>
<?php 
		}
	}
  else{
  	?>
  	<div class="row well">
  	<div col-sm-4>
  	<center><b>Email Not Found Go back and  Register Again <a href="register.php">Back</a> </b></center>
  	</div>
  	</div>
  	 
  <?php }
  
  
  ?>
</div>
 </body>
 </html>