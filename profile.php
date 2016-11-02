<?php session_start(); ?>
<?php include_once 'includes/header.php';?>
<?php include_once 'config/config.php';?>
<?php include_once 'libraries/Database.php';?>
<?php include_once 'libraries/Upload.php';?>
<?php 
$database = new Database();
$uploadImage  = new Upload();
if(isset($_POST['submit_profile'])){
	
	if(isset($_POST['location']) ||  !empty($_POST['location']) &&
			isset($_POST['address']) || !empty($_POST['address'])){
		$location= $_POST['location'];
		$address = $_POST['address'];
		$path =  $uploadImage->uploadImage();
	//	$userId = $_SESSION['userId'];
		$str= "insert into profile(userId,location,address,profileImage) values(1,'$location','$address','$path')";
				$result = $database->addUserData($str);
				if($result){
					header("Location: profession.php");
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
                            <input type="file" id="file" name="file" id="wizard-picture">
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
                          <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                        </div>
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