<?php session_start(); ?>
<?php include_once 'config/config.php';?>
<?php include_once 'libraries/Database.php';?>
<?php include_once 'libraries/Upload.php';?>
<html>
  
<!-- Mirrored from demos.bootdey.com/dayday/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Jan 2016 18:51:13 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="bootstrap social network template">
    <meta name="author" content="">
    <title>Day-Day Social Network</title>

    <link href="bootstrap-3.3.4/css/bootstrap.min.css" rel="stylesheet" />
    <link href="font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" media="screen" />
    <link href="assets/css/creative/gsdk-base.css" rel="stylesheet" />  
    <link href="assets/css/dayday/register.css" rel="stylesheet" />  

    <script src="assets/js/creative/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="bootstrap-3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/creative/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <script src="assets/js/creative/wizard.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="img/favicon.png">
  </head>

<?php 


$database = new Database();
$uploadImage  = new Upload();
$roles = $database->getDataList("select *from roles");


if(isset($_POST['submit_profile'])){
	
	if(isset($_POST['location']) ||  !empty($_POST['location']) &&
			isset($_POST['address']) || !empty($_POST['address']) && 
			isset($_POST['role']) || !empty($_POST['role'])){
		$location= $_POST['location'];
		$address = $_POST['address'];
		$role = $_POST['role'];
		$_SESSION['role'] = $role;
			$userId = $_SESSION['userId'];
		
		$str = "update  users  set userRole='$role' where userId = '$userId'";
        $update = $database->updateData($str);
		
		$path =  $uploadImage->uploadImage();

		$str= "insert into profile(userId,location,address,profileImage) values('$userId','$location','$address','$path')";
				$result = $database->addUserData($str);
				if($result && $update){
					header("Location: profession.php?role='$role'");
				}
	}
	else{
		header("Location: profile.php?error=Please Fill All Information");		
	}
}

?>

<body>
  <div class="image-container register-bg">
    <!--   Big container   -->
    <div class="container">
      <div class="row  animated fadeIn">
        <div class="col-sm-8 col-sm-offset-2">
            <!-- Wizard container -->   
            <div class="wizard-container"> 
              <form method="post" enctype="multipart/form-data">
                <div class="card wizard-card ct-wizard-sky" id="wizard">
                <!-- You can switch "ct-wizard-orange"  with one of the next bright colors: "ct-wizard-blue", "ct-wizard-green", "ct-wizard-orange", "ct-wizard-red"             -->
                <div class="wizard-header text-center">
                <?php if(isset($_POST['error'])){?>
                    <h3><?php echo $_POST['error']; ?></h3> 
                <?php }?>
                  <h1 class="app-title">
                    Social And Study Center
                  </h1>
                </div>
              
                
                  <!-- about tab -->
                  <div class="tab-pane" id="about">
                     
                    <div class="row">

                      <h4 class="info-text"> Complete  Profile Information</h4>
                      <div class="col-sm-4 col-sm-offset-1">
                        <div class="picture-container">
                          
                          <div class="picture">
                            <img src="img/Profile/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                            <input type="file"  name="file" id="wizard-picture">
                          </div>
                          <h6>Choose Picture</h6>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="location">Location</label>
                          <input type="text" class="form-control" id="location"  name="location" placeholder="Enter Locaiton">
                        </div>
                        <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text"  class="form-control" id="address" name="address" placeholder="Enter Address">
                        </div>
                      </div>
                             
                       <div class="col-sm-3 col-sm-offset-4">
                       <strong>Role</strong> <select class="form-control" name="role">
                         <?php if($roles){
                       while($rows= $roles->fetch_assoc()){
                       	?>
                       	<option <?php echo $rows['id'];?>><?php echo $rows['role'];?></option>
                       <?php 
                       }
}
                       ?>
                       </select>
                       </div>
                      <div class="col-sm-4 col-sm-offset-9">
                      <input type="submit" name="submit_profile" class="btn  btn-primary">     
                      </div>
                      
                    </div>
                  
                    </div>
                 

                  </div>	
                </div>
              </form>
            </div> <!-- wizard container -->
          </div>
        </div><!-- end row -->
      </div> <!--  big container -->
    </div>
  </body>

<!-- Mirrored from demos.bootdey.com/dayday/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Jan 2016 18:51:23 GMT -->
</html>