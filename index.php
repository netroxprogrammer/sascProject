<?php  session_start();?>
<?php  include_once 'includes/header.php';?>
<?php  include_once 'libraries/Database.php';?>
<?php  include_once 'config/helping.php';?>
<?php include_once "MainSetting/email.php";?>
<?php 
$database =  new Database();
if(!isset($_SESSION['email']) && !isset($_SESSION['userId'])){
if(isset($_POST['login'])){
	if(isset($_POST['email']) || !empty($_POST['email']) && 
			isset($_POST['password']) || !empty($_POST['password'])){
		$email = $_POST['email'];
		$pass = $_POST['password'];
	
		$str = "select *from  emailverify where email='$email' AND verify='yes'";
		$result = $database->getDataList($str);
		if($result){
			$login = "select userId,firstName,lastName,userRole,phoneNumber,
			BDate,BMonth,BYear,gender from users where userEmail='$email' and password='$pass'";
			$res = $database->getDataList($login);
			if($res){
				$row = $res->fetch_assoc();
				$_SESSION['email'] = $email;
				$_SESSION['userId'] = $row['userId'];
				$_SESSION['firstName'] = $row['firstName'];
				$_SESSION['lastName'] = $row['lastName'];
				$_SESSION['userRole'] = $row['userRole'];
				$_SESSION['BDate'] = $row['BDate'];
				$_SESSION['BMonth'] = $row['BMonth'];
				$_SESSION['BYear'] = $row['BYear'];
				$_SESSION['gender'] = $row['gender'];
				
				header("Location: home.php");
			}
			else{
				header("Location: index.php?error=user Not Found");
			}
		}
		else {
			header("Location: index.php?error=Your Email Not Verify ");
		}
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
              <form  class="pure-form" method="POST">
                <div class="card wizard-card ct-wizard-sky" id="wizard">
                <!-- You can switch "ct-wizard-orange"  with one of the next bright colors: "ct-wizard-blue", "ct-wizard-green", "ct-wizard-orange", "ct-wizard-red"             -->
                <div class="wizard-header text-center">
                  <h1 class="app-title">
                  <?php if(isset($_GET['error'])){?>
                        <div class="alert alert-danger" role="alert">
                        <a href="#" class="alert-link">
                             <?php echo $_GET['error']; ?> </a>
                        </div>
                  <?php }?>
                 Social And Study Center<small>(Login)</small>
                  </h1>
                </div>
                <ul>
                  <li><a href="#about"   data-toggle="tab"></a></li>
                      <center>
                    <div class="row ">
                      <div class="well col-sm-6 col-sm-offset-3">
                
                        <!--  First Name -->
                    
                        <div class="form-group">
                      <label for="name"><b>Email</b></label>
                     <input id="name"  class="form-control" name="email" placeholder="Email" required="" tabindex="1" type="text"> </div>
                     <!--  Last Name -->
                   <div class="form-group">
                      <label for="name"><b>Password</b></label>
                     <input id="password"  class="form-control" name="password" placeholder="Password" required="" tabindex="1" type="password"> </div>
                   
                
  </div>  <!-- End  Form Column    -->
                    
                    </div>
                    </center>
                    
                  <div class="wizard-footer">
                  
                    <div class="pull-right">
                        <input type='submit' value="login" class="btn btn-primary" name="login"> 
                    </div>
                        <a href="register.php" class="btn btn-primary" >Register </a> 
                    </div>
                </ul>

                <div class="tab-content">
                  <!-- about tab -->
                  
                  <div class="tab-pane" id="about">
                
                  </div><!-- end about tab -->                  
                  </div><!-- end address tab -->

                    <div class="clearfix"></div>
                  </div>  
                </div>
              </form>
            </div> <!-- wizard container -->
          </div>
        </div><!-- end row -->
      </div> <!--  big container -->
    </div>
<?php }
else{
	
	header("Location: home.php");
	
	 }?>    
  </body>

<!-- Mirrored from demos.bootdey.com/dayday/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Jan 2016 18:51:23 GMT -->
</html>
