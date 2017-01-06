<?php session_start(); ?>
<?php  include_once 'config/config.php'; ?>
<?php include_once 'config/Settings.php';?>
<?php  include_once 'libraries/Database.php';?>
<?php include_once 'libraries/Upload.php';?>
<?php
$database = new Database();

?>
<!DOCTYPE html>
<html>
  

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="bootstrap social network template">
    <meta name="author" content="">
    <title>SASC | Social And Study Center</title>
    <!-- Bootstrap and css styles -->
    
       <link href="assets/css/dayday/timeline.css" rel="stylesheet" media="screen"> 
	    <link href="assets/css/dayday/big-cover.css" rel="stylesheet" media="screen">
            <link href="bootstrap-3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/animate.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/dayday/dayday.css" rel="stylesheet" media="screen">
    <link href="assets/css/dayday/timeline.css" rel="stylesheet" media="screen">
    <link href="assets/css/dayday/photos.css" rel="stylesheet" media="screen">
    
    <!-- Bootstrap, Jquery and page scripts -->
    <script type="text/javascript"  src="assets/js/jquery.min.js"></script>
    <script type="text/javascript"  src="bootstrap-3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript"  src="assets/js/dayday/dayday.js"></script>
    <link rel="shortcut icon" href="img/favicon.png">
  </head>
  <body>
	<nav class="navbar navbar-fixed-top navbar-default navbar-principal"
		style="min-height: 53px;">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home.php"> <b>SASC</b></a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<div class="col-md-5 col-sm-4">
					<form class="navbar-form">
						<div class="form-group" style="display: inline;">
							<div class="input-group" style="display: table;">
								<input class="form-control" name="search"
									placeholder="Search..." autocomplete="off"
									autofocus="autofocus" type="text"> <span
									class="input-group-addon" style="width: 1%;"> <span
									class="glyphicon glyphicon-search"></span>
								</span>
							</div>
						</div>
					</form>
				</div>

				
				<ul class="nav navbar-nav navbar-right">
                                  
                             <li><a href="acceptRequests.php"><i class="fa fa-user"> </i><span class="badge badge-error "  
                                        data-toggle="tooltip" data-placement="bottom"
                                        title="Requests"><div id="request">0</div></span></a></li> 
                                 
                             
                                    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

<li><a href="MyLogs.php" class="nav-controller"> <i class="fa fa-history"></i></i>Logs</a></li>
					<li><a href="logout.php?message=logout sucessfully"
						class="nav-controller"><i class="fa fa-comment"></i>Logout</a></li>
                                                <?php if($_SESSION['userRole']=="teacher"){  ?>
                                                <li><a href="others/teacherIndex.php"
						class="nav-controller"><i class="fa fa-comment"></i>Switch</a></li>
 
                                                <?php }?>
                                               
                                                <?php 
                                                if($_SESSION['userRole']=="student"){  ?>
                                                <li><a href="others/studentIndex.php"
						class="nav-controller"><i class="fa fa-comment"></i>Switch</a></li>
 
                                                <?php }?>

				</ul>
			</div>
		</div>
	</nav>

	<div
		class="col-md-7 col-sm-9 timeline-container col-md-offset-1 animated fadeIn">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<style>
.cover-photo {
	background: url('img/Cover/cover_2.jpg');
	background-color: #435e9c;
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
	color: white;
	height: 315px;
}
</style>

<?php  
$userId =$_SESSION['userId'];
$getImage = $database->getDataList("select *from  profile where userId='$userId'");
if($getImage){
$image = $getImage->fetch_assoc();

?>
				<div class="cover-photo">
					<img src="<?php  echo $image['profileImage']; ?>" 

						class="profile-photo img-thumbnail show-in-modal">
					<div class="cover-name"><?php echo ucwords($_SESSION['firstName'] ." " .$_SESSION['lastName']);?></div>
				</div>
<?php } else{
    ?>
<div class="cover-photo">
    <img src="img/Profile/default.jpg" 

						class="profile-photo img-thumbnail show-in-modal">
					<div class="cover-name"><?php echo ucwords($_SESSION['firstName'] ." " .$_SESSION['lastName']);?></div>
				</div>
<?php }
?>


			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="panel-options">
					<div class="navbar navbar-default navbar-cover">
						<div class="container-fluid">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed"
									data-toggle="collapse" data-target="#profile-opts-navbar">
									<span class="sr-only">Toggle navigation</span> <span
										class="icon-bar"></span> <span class="icon-bar"></span> <span
										class="icon-bar"></span>
								</button>
							</div>
							<div class="collapse navbar-collapse" id="profile-opts-navbar">
								<ul class="nav navbar-nav navbar-right">
								  <!-- add Menu -->
									<?php include_once 'elements/Menus.php'; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
      

      <div class="row"> 
        <div class="col-md-12 user-detail">
          <!-- content -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="panel panel-default panel-list-photos">
                <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-image"></i>&nbsp; Photos</h3>
                </div>
                <div class="panel-body">
                    <?php
                    $userId = $_SESSION['userId'];
		$ph= "select *from posts  where userId='$userId' and  image <> 'upload/' LIMIT 6 ";
		$photo = $database->getDataList($ph);
		if($photo){
                   while ($phot = $photo->fetch_assoc()){ 
                
		?>
                  <div class="col-md-4 col-sm-6 col-xs-6 photo-content">
                    <img src="<?php echo $phot['image']; ?>" alt="<?php echo $phot['userName']; ?>" class="img-responsive img-rounded  show-in-modal">
                  </div>
<?php } } ?>
                  
                </div>
              </div>
            </div>
        </div>
      </div><!-- end user details -->
    </div><!-- end timeline content-->
      </div>
</body>
</html>