<?php session_start(); ?>
<?php include_once 'includes/header.php';?>
<?php include_once 'config/config.php';?>
<?php include_once 'libraries/Database.php';?>
<?php include_once 'libraries/Upload.php';?>
<?php 
$database = new Database();
$section_array= array();
$batch_array= array();
$program = $database->getDataList("select *from programs");
$batch = $database->getDataList("select *from batch");
 $section= $database->getDataList("select *from sections");
//$section1= $database->getDataList("select *from sections");
$semester= $database->getDataList("select *from semester");
$userId = $_SESSION['userId'];
$role = $_SESSION['role'];
$checkUser = "select userId,userRole from users where userId = '$userId' AND userRole='$role'";
$database->getDataList($checkUser);
if($checkUser){
	
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
                  <h1 class="app-title">
                    Social And Study Center
                  </h1>
                </div>
              
                
                  <!-- about tab -->
                  <div class="tab-pane" id="about">
                     
                    <div class="row">

                      <h4 class="info-text"> Complete  Profile Information</h4>
 
                     <div class="col-sm-3 col-sm-offset-1">
                       <strong>Program</strong>  
                      <select class="form-control" name="program">
                       <?php if($program){
                       while($rows= $program->fetch_assoc()){
                       	?>
                       	<option <?php echo $rows['id'];?>><?php echo $rows['programs'];?></option>
                       <?php 
                       }
}
                       ?>
                       </select>
                       </div>
                       
                       <div class="col-sm-2">
                       <strong>Batch</strong> <select class="form-control" name="batch">
                         <?php if($batch){
                       while($rows= $batch->fetch_assoc()){
                       	?>
                       	<option <?php echo $rows['id'];?>><?php echo $rows['batch'];?></option>
                       <?php 
                       }
}
                       ?>
                       </select>
                       </div>
                       <div class="col-sm-2">
                       <strong>Section</strong> <select class="form-control" name="section">
                       <?php if($section){
                       while($rows= $section->fetch_assoc()){
                       	$section_array[] = $rows['sections'];
                       	?>
                       	<option <?php echo $rows['id'];?>><?php echo $rows['sections'];?></option>
                       <?php 
                       }
}
                       ?>
                       </select>
                     
                    </div>
                    <div class="col-sm-3">
                       <strong>Semester</strong> <select class="form-control" name="semeter">
                       <?php if($semester){
                       while($rows= $semester->fetch_assoc()){
                       	?>
                       	<option <?php echo $rows['id'];?>><?php echo $rows['semester'];?></option>
                       <?php 
                       }
}
                       ?>
                       </select>
                     
                    </div>
                    </div>
                  <!-- Second Row-->
                  
                   <div class="row">

                 
 <hr>
                      <div class="col-sm-3 col-sm-offset-1">
                 
                     
                          <div class="form-group">
                          <label for="address">Course 2:</label>
                          <input type="text"  class="form-control" id="address" name="course_two" placeholder="Enter Address">
                        </div>
                          <div class="form-group">
                          <label for="address">Course 3:</label>
                          <input type="text"  class="form-control" id="address" name="course_three" placeholder="Enter Address">
                        </div>
                          <div class="form-group">
                          <label for="address">Course 4:</label>
                          <input type="text"  class="form-control" id="address" name="course_four" placeholder="Enter Address">
                        </div>
                          <div class="form-group">
                          <label for="address">Course 5:</label>
                          <input type="text"  class="form-control" id="address" name=course_five placeholder="Enter Address">
                        </div>
                          <div class="form-group">
                          <label for="address">Course 6:</label>
                          <input type="text"  class="form-control" id="address" name="course_six" placeholder="Enter Address">
                        </div>
                          <div class="form-group">
                          <label for="address">Course 7:</label>
                          <input type="text"  class="form-control" id="address" name="course_seven" placeholder="Enter Address">
                        </div>
                  </div>
                    <!-- Sections  -->
                       <div class="col-sm-2">
                 
                       <label>Section</label> <select class="form-control" name="section_one">
                       <?php 
                       foreach ($section_array  as $sec){
                       	?>
                       	<option <?php echo $sec;?>><?php echo $sec ;?></option>
                       <?php 
                       }

                       ?>
                       </select>
              
                           <label>Section</label><select class="form-control" name="section_two">
                         <?php 
                       foreach ($section_array  as $sec){
                       	?>
                       	<option <?php echo $sec;?>><?php echo $sec ;?></option>
                       <?php 
                       }

                       ?>
                       </select>
                     
                   
                          <label>Section</label> <select class="form-control" name="section_three">
                        <?php 
                       foreach ($section_array  as $sec){
                       	?>
                       	<option <?php echo $sec;?>><?php echo $sec ;?></option>
                       <?php 
                       }

                       ?>
                       </select>
                       
                           <label>Section</label> <select class="form-control" name="section_four">
                         <?php 
                       foreach ($section_array  as $sec){
                       	?>
                       	<option <?php echo $sec;?>><?php echo $sec ;?></option>
                       <?php 
                       }

                       ?>
                       </select>
                       
                          <label>Section</label><select class="form-control" name="section_five">
                         <?php 
                       foreach ($section_array  as $sec){
                       	?>
                       	<option <?php echo $sec;?>><?php echo $sec ;?></option>
                       <?php 
                       }

                       ?>
                       </select>
                       
                           <label>Section</label> <select class="form-control" name="section_six">
                        <?php 
                       foreach ($section_array  as $sec){
                       	?>
                       	<option <?php echo $sec;?>><?php echo $sec ;?></option>
                       <?php 
                       }

                       ?>
                       </select>
                       
                           <label>Section</label> <select class="form-control" name="section_seven">
                        <?php 
                       foreach ($section_array  as $sec){
                       	?>
                       	<option <?php echo $sec;?>><?php echo $sec ;?></option>
                       <?php 
                       }

                       ?>
                       </select>
                  </div>
                  <!--  batch Code -->
                      <div class="col-sm-2">
                 
                       <label>Section</label> <select class="form-control" name="batch_one">
                       <?php 
                       foreach ($section_array  as $sec){
                       	?>
                       	<option <?php echo $sec;?>><?php echo $sec ;?></option>
                       <?php 
                       }

                       ?>
                       </select>
              
                           <label>Section</label><select class="form-control" name="batch_two">
                         <?php 
                       foreach ($section_array  as $sec){
                       	?>
                       	<option <?php echo $sec;?>><?php echo $sec ;?></option>
                       <?php 
                       }

                       ?>
                       </select>
                     
                   
                          <label>Section</label> <select class="form-control" name="batch_three">
                        <?php 
                       foreach ($section_array  as $sec){
                       	?>
                       	<option <?php echo $sec;?>><?php echo $sec ;?></option>
                       <?php 
                       }

                       ?>
                       </select>
                       
                           <label>Section</label> <select class="form-control" name="batch_four">
                         <?php 
                       foreach ($section_array  as $sec){
                       	?>
                       	<option <?php echo $sec;?>><?php echo $sec ;?></option>
                       <?php 
                       }

                       ?>
                       </select>
                       
                          <label>Section</label><select class="form-control" name="batch_five">
                         <?php 
                       foreach ($section_array  as $sec){
                       	?>
                       	<option <?php echo $sec;?>><?php echo $sec ;?></option>
                       <?php 
                       }

                       ?>
                       </select>
                       
                           <label>Section</label> <select class="form-control" name="batch_six">
                        <?php 
                       foreach ($section_array  as $sec){
                       	?>
                       	<option <?php echo $sec;?>><?php echo $sec ;?></option>
                       <?php 
                       }

                       ?>
                       </select>
                       
                           <label>Section</label> <select class="form-control" name="batch_seven">
                        <?php 
                       foreach ($section_array  as $sec){
                       	?>
                       	<option <?php echo $sec;?>><?php echo $sec ;?></option>
                       <?php 
                       }

                       ?>
                       </select>
                  </div>
                    
                    </div>
                 <!-- End Second Row  -->
 
                      <div class="col-sm-4 col-sm-offset-9">
                      <input type="submit" name="submit_profile" class="btn  btn-primary">     
                      </div>
                      
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
    	header("Location: error404.php");
    }	

?>
  </body>

<!-- Mirrored from demos.bootdey.com/dayday/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Jan 2016 18:51:23 GMT -->
</html>
