<?php session_start(); ?>
<?php  include_once 'config/config.php'; ?>
<?php include_once 'config/Settings.php';?>
<?php  include_once 'libraries/Database.php';?>
<?php include_once 'libraries/Upload.php';?>
<?php
$usersTable = USERSTABLE;
$database = new Database();

?>
<?php include_once 'elements/FindFriendElem.php'; ?>
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

	<div class="col-md-7 col-sm-9 timeline-container col-md-offset-1 animated fadeIn">
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
            <!-- End Of the TimeLine -->
            
            
           
      <div class="row"> 
        <div class="col-md-12 user-detail">
          <!-- content -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">
                    <i class="fa fa-users"></i>&nbsp; Friends
                    
                  </h3>
                    
                    
                  </h3>
                  
                </div>
                  
                <div class="panel-body">
                    
                    <div class="col-xs-12 well ">
                        <a href="sendFriendRequest.php" class="panel-title" > <i class="fa fa-search"> </i>&nbsp;&nbsp;Find Friends</a>
                      
                  </div>
                    
                  <!-- friend 1 -->

                  <?php 
                      $userId = $_SESSION['userId'];
                       $findRequest = $database->getDataList("select *from sendfriendrequest where friendId='$userId' AND status='yes'");
                       if($findRequest){
                           while ($requestRow = $findRequest->fetch_assoc()){
                               $senderId  = $requestRow['senderId'];
                      
                      $userImages = $database->getDataList("Select *from profile where userId='$senderId' and userId<>'$userId'");
                      if($userImages){
                      $profileRow = $userImages->fetch_assoc();
                      
                        $users = $database->getDataList("Select *from users where userId='$senderId'");

                       if($users){
                     $userRow= $users->fetch_assoc();
                     $profileTable = PROFILETABLE;
                      $userIds = $userRow['userId']; 
                      
                      $userId= $_SESSION['userId'];
                     
                   ?>
                  <div class="col-md-6 cols-sm-12 col-xs-12">
                    <div class="media block-update-card">
                      <a class="pull-left" href="#">
                        <img class="media-object update-card-MDimentions" src="<?php echo $profileRow['profileImage']; ?>" 
                             alt="<?php  echo $userRow['firstName']. $userRow['lastName']; ?>">
                      </a>
                      <div class="media-body update-card-body">
                        <h4 class="media-heading"><?php  echo $userRow['firstName']." ". $userRow['lastName']; ?></h4>
                        <div class="btn-toolbar card-body-social" role="toolbar">
                          <a class="btn btn-default btn-xs fa fa-envelope info tip" title="Send message"></a>
                          
                             <a href="acctionOnRequest.php?action=unfriend&senderId=<?php echo $senderId; ?> "  class="btn btn-danger btn-xs ">Un Friend</a>
                         </div>
                      </div>
                    </div> 
                  </div><!-- end friend 1-->
                  <?php
                  }else{ ?>
                      
                 
                      <?php
                   }
                      }
                           }
                               
                       //    }
                     //  }
                      
                         
                  }
                  ?>
                 
                </div>
              </div>
            </div>
        </div>
      </div><!-- end user details -->
    </div><!-- end timeline content-->

            
        </div>
           
</body>
</html>