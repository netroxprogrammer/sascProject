<!DOCTYPE html>


<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
 
<meta charset="utf-8">
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
<meta name="author" content="Muhammad Usman">

<link id="bs-css" href="includes/css/bootstrap-cerulean.min.css" rel="stylesheet">
<link href="includes/css/charisma-app.css" rel="stylesheet">
<link href='includes/bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
<link href='includes/bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
<link href='includes/bower_components/chosen/chosen.min.css' rel='stylesheet'>
<link href='includes/bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
<link href='includes/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
<link href='includes/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
<link href='includes/css/jquery.noty.css' rel='stylesheet'>
<link href='includes/css/noty_theme_default.css' rel='stylesheet'>
<link href='includes/css/elfinder.min.css' rel='stylesheet'>
<link href='includes/css/elfinder.theme.css' rel='stylesheet'>
<link href='includes/css/jquery.iphone.toggle.css' rel='stylesheet'>
<link href='includes/css/uploadify.css' rel='stylesheet'>
<link href='includes/css/animate.min.css' rel='stylesheet'>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css" />
<link href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" />
<sript src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js" ></sript>
<script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js" />


<script src="includes/bower_components/jquery/jquery.min.js"></script>
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
 
</head>
<body>
 
<div class="navbar navbar-default" role="navigation">
<div class="navbar-inner">
 
<div class="btn-group pull-right">
    <?php if($_SESSION['userRole']=='coordinator'){  ?>
    <a href="../logout.php" class="btn btn-default" > <i class="glyphicon glyphicon-lock"></i> Logout</a>
    <?php }else{?>
      <a href="../home.php" class="btn btn-default" > <i class="glyphicon glyphicon-backward"></i> Social</a>
    <a href="../logout.php" class="btn btn-default" > <i class="glyphicon glyphicon-lock"></i> Logout</a>

    <?php } ?>
</div>
 
 
<ul class="collapse navbar-collapse nav navbar-nav top-menu">
<li><a href="#"><i class="glyphicon glyphicon-globe"></i> SASC</a></li>

<li>

</li>
</ul>
</div>
</div>
 
<div class="ch-container">
<div class="row">
 
<div class="col-sm-2 col-lg-2">
<div class="sidebar-nav">
<div class="nav-canvas">
<div class="nav-sm nav nav-stacked">
</div>
<ul class="nav nav-pills nav-stacked main-menu">
<li class="nav-header">Main</li>
<?php if($_SESSION['userRole']=='coordinator'){  ?>
<li><a class="ajax-link" href="index.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
</li>
<li><a class="ajax-link" href="assignCourse.php"><i class="glyphicon glyphicon-eye-open"></i><span>&nbsp;Assign Courses</span></a>
</li>
<li><a class="ajax-link" href="uploadTimeTable.php"><i class="glyphicon glyphicon-time"></i><span> Upload Time Table</span></a></li>
<li><a class="ajax-link" href="NewsUpdates.php"><i class="glyphicon glyphicon-globe"></i><span> News Updates</span></a>
</li>
<li><a class="ajax-link" href="uploadDateSheet.php"><i class=" glyphicon glyphicon-upload"></i><span> Upload Date Sheet</span></a>
</li>
<li class="nav-header hidden-md">View/Edit Sections</li>
<li><a class="ajax-link" href="ViewAssignCourses.php"><i class="glyphicon glyphicon-eye-open"></i><span>View Assign Courses</span></a></li>
<li><a class="ajax-link" href="ViewTimeTable.php"><i class="glyphicon glyphicon-calendar"></i><span> View Time Table</span></a></li>
<li><a class="ajax-link" href="ViewNewsUpdates.php"><i class="glyphicon glyphicon-calendar"></i><span> View News Updates</span></a>
</li>
<li><a class="ajax-link" href="ViewDateSheets.php"><i class="glyphicon glyphicon-th"></i><span> View Date Sheet</span></a></li>
<?php }
?>
<?php if($_SESSION['userRole']=='teacher'){  ?>

<li><a class="ajax-link" href="teacherIndex.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a></li>
<li><a class="ajax-link" href="addQuizMarks.php"><i class="glyphicon glyphicon-home"></i><span> Add Quiz Marks</span></a></li>
<li><a class="ajax-link" href="addMidMarks.php"><i class="glyphicon glyphicon-home"></i><span>Mid Term Marks</span></a></li>
<li><a class="ajax-link" href="addFinalmarks.php"><i class="glyphicon glyphicon-home"></i><span>Final Term Marks</span></a></li>
<li><a class="ajax-link" href="studentNewsUpdates.php"><i class="glyphicon glyphicon-home"></i><span> Add News Updates</span></a></li>
<li><a class="ajax-link" href="uploadLecture.php"><i class="glyphicon glyphicon-home"></i><span> Upload Lecture</span></a></li>
<li class="nav-header hidden-md">View/Edit Sections</li>
<li><a class="ajax-link" href="viewMarks.php"><i class="glyphicon glyphicon-home"></i><span>View Quiz Marks</span></a></li>
<li><a class="ajax-link" href="SearchNewsUpdates.php"><i class="glyphicon glyphicon-home"></i><span>View News</span></a></li>
<li><a class="ajax-link" href="SearchLecture.php"><i class="glyphicon glyphicon-home"></i><span>View Lectures</span></a></li>
<li class="nav-header hidden-md">Courses Section</li>
<li><a class="ajax-link" href="MyCourse.php"><i class="glyphicon glyphicon-home"></i><span>My Courses</span></a></li>
<li><a class="ajax-link" href="MyTimeTable.php"><i class="glyphicon glyphicon-home"></i><span>My Time Table</span></a></li>
    <?php } ?>
<?php if($_SESSION['userRole']=='student'){  ?>

<li><a class="ajax-link" href="studentIndex.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a></li>
<li><a class="ajax-link" href="sMyTimeTable.php"><i class="glyphicon glyphicon-home"></i><span> My Time Table</span></a></li>
<li><a class="ajax-link" href="sReadCoodinatorNews.php"><i class="glyphicon glyphicon-home"></i><span>Coordinator News</span></a></li>
<li><a class="ajax-link" href="sReaadTeacherNews.php"><i class="glyphicon glyphicon-home"></i><span>Teacher News</span></a></li>
<li><a class="ajax-link" href="sViewQuizMarks.php"><i class="glyphicon glyphicon-home"></i><span> Quiz Marks</span></a></li>
<li><a class="ajax-link" href="sViewMidMarks.php"><i class="glyphicon glyphicon-home"></i><span> Mid Marks</span></a></li>
<li><a class="ajax-link" href="sViewFinalMarks.php"><i class="glyphicon glyphicon-home"></i><span>Final Marks</span></a></li>
<li><a class="ajax-link" href="sMyLectures.php"><i class="glyphicon glyphicon-home"></i><span>My Lectures</span></a></li>

    <?php } ?>
</ul>
</div>
</div>
</div>
 