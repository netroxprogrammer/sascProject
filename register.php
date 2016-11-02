<?php  session_start();?>
<?php  include_once 'includes/header.php';?>
<?php  include_once 'libraries/Database.php';?>
<?php  include_once 'config/helping.php';?>
<?php 
$database =  new Database();
$days = $database->getDataList("select *from days");
$months = $database->getDataList("select *from month");
$years = $database->getDataList("select *from years");
if(isset($_POST['register'])){
if(isset($_POST['firstname']) && !empty($_POST['firstname']) ||
		isset($_POST['lastname']) && !empty($_POST['lastname']) ||
		isset($_POST['password']) && !empty($_POST['password']) ||
		isset($_POST['comfirmPassword']) && !empty($_POST['comfirmPassword']) ||
		isset($_POST['email']) && !empty($_POST['email']) ||
		isset($_POST['phonenumber']) && !empty($_POST['phonenumber']) ||
		isset($_POST['gender']) && !empty($_POST['gender']) ||
		isset($_POST['day']) && !empty($_POST['day']) ||
		isset($_POST['month']) && !empty($_POST['month']) ||
		isset($_POST['year']) && !empty($_POST['year'])){
	$firstName = $_POST['firstname'];
	$lastName = $_POST['lastname'];
	$password = $_POST['password'];
	$comfirmPassword = $_POST['comfirmPassword'];
	$email = $_POST['email'];
	$phonenumber= $_POST['phonenumber'];
	$gender = $_POST['gender'];
	$day = $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	if($password == $comfirmPassword){
	$str = "insert into users(firstName,lastName,password,userEmail,phoneNumber,BDate,BMonth,BYear,gender)
			 values('$firstName','$lastName','$password','$email','$phonenumber','$day','$month','$year','$gender')";
	$result = $database->LoginUser($str);
	$string = generateRandomString();
	if($result>0){
		$str =  "insert into  emailverify(userId,email,tokken) values('$result','$email','$string')";
		$emailVerify = $database->EmailVeirfy($str);
		if($emailVerify){
			$_SESSION['userId'] = $result;
		header("Location: verify.php?email=".$email);
		}
	}else{
		header("Location: register.php?error=Sorry Data not Save");
	}
}
else
{
	header("Location: register.php?error=password not  match");
}
}
else{
	header("Location: register.php?error=Please Give All  Information");
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
                 Social And Study Center
                  </h1>
                </div>
                <ul>
                  <li><a href="#about"   data-toggle="tab"></a></li>
                  
                  
                </ul>

                <div class="tab-content">
                  <!-- about tab -->
                  
                  <div class="tab-pane" id="about">
                    <center>
                    <div class="row ">
                      <div class="well col-sm-6 col-sm-offset-3">
                
                        <!--  First Name -->
                    
                        <div class="form-group">
                      <label for="name"><b>FirstName</b></label>
                     <input id="name"  class="form-control" name="firstname" placeholder="First Name" required="" tabindex="1" type="text"> </div>
                     <!--  Last Name -->
                    <div class="form-group">
                      <label for="name"><b>LastName</b></label>
                     <input id="name"  class="form-control" name="lastname" placeholder="Last Name" required="" tabindex="1" type="text"> </div>
                   <div class="form-group">
                      <label for="name"><b>Password</b></label>
                     <input id="password"  class="form-control" name="password" placeholder="Password" required="" tabindex="1" type="password"> </div>
                    <div class="form-group">
                      <label for="name"><b>Comfirm Password</b></label>
                     <input id="confirmPassword"   class="form-control" name="comfirmPassword" placeholder="Comfirm Password" required="" tabindex="1" type="password"> </div>
                    
                       <!--  Email -->
                    <div class="form-group">
                      <label for="name"><b>Email</b></label>
                     <input id="email"  class="form-control" name="email" placeholder="Email" required="" tabindex="1" type="email"> </div>
                       <!--  Phone Number -->
                       <div class="form-group">
                          <label for="exampleInputEmail1"><b>Phone Number</b></label>
                          <input type="text" class="form-control" id="exampleInputEmail1" name="phonenumber" placeholder="Phone Number">
                        </div>
                          <!--  Gender-->
                          <label for="exampleInputEmail1"><b>Gender</b></label>
                    <div class="radio">
                <label><input type="radio" name="gender" value="male">Male</label>
                  </div>
                <div class="radio">
                &nbsp;&nbsp;&nbsp;<label><input type="radio" name="gender" value="female">female</label>
                    </div>
                     <hr style="height:1px;border:none;color:#333;background-color:#333;" >        <!--  Day -->
                          <div class="form-group">
                       <?php if($days){
                       ?>
                       
                       <label for="sel1"><b>Date</b></label>
                      <select class="form-control" name="day" id="sel1">
                        <?php while($rows= $days->fetch_assoc()){ ?>
                        <option><?php echo $rows["dayName"];?></option>
                       <?php }?>
                      </select>
                      
                      <?php }?>
                       </div>
                         <!--  month -->
                           <div class="form-group">
                            <?php if($months){
                       ?>
                       <label for="sel1"><b>Month</b></label>
                      <select class="form-control" name="month" id="sel1">
                       <?php while($rows= $months->fetch_assoc()){ ?>
                        <option><?php echo $rows["monthName"];?></option>
                       <?php }?>
                      </select>
                      <?php }?>
                       </div>
                        <!--  Year -->

                    <div class="form-group">
                    <?php if($years){
                       ?>
                       <label for="sel1"><b>Year</b></label>
                      <select class="form-control" name="year" id="sel1">
                        <?php while($rows= $years->fetch_assoc()){ ?>
                        <option><?php echo $rows["yearName"];?></option>
                       <?php }?>
                      </select>
                      <?php }?>
                       </div> 
  </div>  <!-- End  Form Column    -->
                    
                    </div>
                    </center>
                  </div><!-- end about tab -->                  
                  </div><!-- end address tab -->

                  <div class="wizard-footer">
                    <div class="pull-right">
                        <input type='submit' class="btn btn-primary" name="register"> 
                    </div>
                  
                    <div class="clearfix"></div>
                  </div>  
                </div>
              </form>
            </div> <!-- wizard container -->
          </div>
        </div><!-- end row -->
      </div> <!--  big container -->
    </div>
    <script type="text/javascript">
    var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirmPassword");

  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;

    </script>
  </body>

<!-- Mirrored from demos.bootdey.com/dayday/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Jan 2016 18:51:23 GMT -->
</html>