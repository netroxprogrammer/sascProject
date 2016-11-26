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
	if(isset($_POST['addTeacher'])){
		if(isset($_POST['skills'])){
			$skills = $_POST['skills'];
			$experiance = $_POST['experiance'];
			$extra = $_POST['extra'];
			$userId = $_SESSION['userId'];
			$str = "insert into teachers(userId,teacherSkills,teacherExpeirance,teacherExtra) values(
		              '$userId','$skills','$experiance','$extra')";
			$result = $database->addUserData($str);
			if($result){
				header("Location: logout.php?");
			}
			else{
					header("Location: profession.php?message=Sorry Try Again");
			}
		}
	}
	if(isset($_POST['add_Course'])){
		

		if(isset($_POST['section']) && isset($_POST['program']) &&
				isset($_POST['batch']) && isset($_POST['semeter']) &&
				isset($_POST['course_one']) &&
				isset($_POST['section_one']) &&
				isset($_POST['batch_one']) &&
				isset($_POST['course_code'])
				){
			$sections = $_POST['section'];
			$programs = $_POST['program'];
			$studentBatch = $_POST['batch'];
			$studentsemster = $_POST['semeter'];
			$courseName = $_POST['course_one'];
			$coursesection = $_POST['section_one'];
			$courseBatch = $_POST['batch_one'];
			$courseCode = $_POST['course_code'];
			$str = "insert into students(userId,program,studentBatch,semester,
						studentSection,courceName,courseBatch,courseSection,courseCode) 
					values('$userId','$programs','$studentBatch','$studentsemster',
			'$sections','$courseName','$courseBatch','$coursesection','$courseCode') ";
			$addcourse = $database->addUserData($str);
			
			if($addcourse){
				header("Location: profession.php?message=Course Add Successfully");
			}
			else{
				header("Location: profession.php?message=Sorry Course Not Add");
					
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
              <form method="post">
                <div class="card wizard-card ct-wizard-sky" id="wizard">
                <!-- You can switch "ct-wizard-orange"  with one of the next bright colors: "ct-wizard-blue", "ct-wizard-green", "ct-wizard-orange", "ct-wizard-red"             -->
                  <div class="wizard-header text-center">
                  <h1 class="app-title">
                    Social And Study Center
                  </h1>
                  <?php if(isset($_GET['message'])){?>
                  <p class="bg-danger"><?php echo $_GET['message'];?></p>
                  
                  <?php }?>
                </div>
              
                
                  <!-- about tab -->
                  <div class="tab-pane" id="about">
                     
                    <div class="row">

                      <h4 class="info-text"> Complete  Profile Information</h4>
                   <?php if($role=="student"){ ?>
 
                     <div class="col-sm-3 col-sm-offset-1">
                       <strong>Program</strong>  
                      <select class="form-control" name="program" required>
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
                       <strong>Batch</strong> 
                       <select class="form-control" name="batch"  >
                         <?php if($batch){
                       while($rows= $batch->fetch_assoc()){
                       	$batch_array[] = $rows['batch'];
                       	?>
                       	<option <?php echo $rows['id'];?>><?php echo $rows['batch'];?></option>
                       <?php 
                       }
}
                       ?>
                       </select>
                       </div>
                       <div class="col-sm-2">
                       <strong>Section</strong> <select class="form-control" name="section" >
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
                       <strong>Semester</strong> <select class="form-control" name="semeter" required>
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
                          <label for="address">Course 1:</label>
                          <input type="text"  class="form-control" id="address" name="course_one" placeholder="Course Name" required>
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
              <br>
                     
                  </div>
                  <!--  batch Code -->
                      <div class="col-sm-2">
                 
                       <label>Batch</label> <select class="form-control" name="batch_one">
                       <?php 
                       foreach ($batch_array  as $sec){
                       	?>
                       	<option <?php echo $sec;?>><?php echo $sec ;?></option>
                       <?php 
                       }

                       ?>
                       </select>
            
                  </div>
                   <div class="col-sm-2">
                 
                          <div class="form-group">
                          <label for="address">Course Code:</label>
                          <input type="text"  class="form-control" id="address" name="course_code"  required>
                        </div>
                     
                     
                  </div>
                  <!--  Cource Code -->
                  
                      <div class="col-sm-5 col-sm-offset-5">
                     
                      <input type="submit" name="add_Course"  value="Add Course" class="btn  btn-primary"> &nbsp; &nbsp; &nbsp;
                       &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                       <a href="logout.php?message=profile complete start login"  class="btn  btn-default"> Next </a>     
                      </div>
                      <?php }else{?>
                   <div class="col-sm-12">
                   <div class="form-group">
                          <label for="address"><b>Add Skills</b></label>
                    <input type="text" name="skills" placeholder="add Skills"  class="form-control" required />
                    </div>
                    <div class="col-sm-12">
                  <div class="form-group">
                <label for="comment"><b>Experiance</b></label>
                 <textarea class="form-control" rows="5" id="comment" name="experiance"></textarea>
                  </div>
                    <div class="col-sm-12">
                  <div class="form-group">
                <label for="comment"><b>Extra Activities</b></label>
                 <textarea class="form-control" rows="5" id="comment" name="extra"></textarea>
                  </div>
                  
                   </div>
                  
                      <div class="col-sm-10 col-sm-offset-5">
                     
                      <input type="submit" name="addTeacher"  value="Submit" class="btn  btn-primary"> &nbsp; &nbsp; &nbsp;
                          
                      </div>    
               
               
               <?php }?>
                    
                    </div>
                 <!-- End Second Row  -->
 
                      
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
