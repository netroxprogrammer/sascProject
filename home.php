<?php session_start(); ?>
<?php  include_once 'config/config.php'; ?>
<?php include_once 'config/Settings.php';?>
<?php  include_once 'libraries/Database.php';?>
<?php include_once 'libraries/Upload.php';?>
<script>

var inProcess = false;//Just to make sure that the last ajax call is not in process
setTimeout( function () {
    if (inProcess) {
        return false;//Another request is active, decline timer call ...
    }
    inProcess = true;//make it burn ;)
    jQuery.ajax({
        url: 'countRequest.php', //Define your script url here ...
        data: '', //Pass some data if you need to
        method: 'POST', //Makes sense only if you passing data
        success: function(answer) {
            jQuery('#request').html(answer);//update your div with new content, yey ....
            inProcess = false;//Queue is free, guys ;)
        },
        error: function() {
            //unknown error occorupted
            inProcess = false;//Queue is free, guys ;)
        }
    });
}, 500 );
</script>
    
    <?php

$database = new Database ();
$uploadImage = new Upload ();
if (isset ( $_SESSION ['email'] ) && isset ( $_SESSION ['userId'] )) {
	$userId = $_SESSION ['userId'];
	$firstName = $_SESSION ['firstName'];
	$lastName = $_SESSION ['lastName'];
	$userName = $firstName . " " . $lastName;
	if (isset ( $_POST ['post_status'] )) {
		if (isset ( $_POST ['status'] ) || ! empty ( $_POST ['status'] )) {
			$status = $_POST ['status'];
			// $image = $_POST['file'];
			$privacy = $_POST ['privacy'];
			$path = $uploadImage->uploadImage ();
			$str = "insert  into  posts(userId,userName,image,status,privacy) 
			values('$userId','$userName','$path','$status','$privacy')";
			$addPost = $database->addUserData ( $str );
			if ($addPost) {
				header ( "Location: home.php" );
			} else {
				header ( "Location: home.php?error=sorry status not  post" );
			}
		}
	}
	$allPost = $database->getDataList ( "select *from posts where  userId='$userId'  ORDER BY  postId DESC" );
	
	?>
		<?php
			 if (isset($_POST['comment_p']) && isset($_POST['comment_msg']) && !empty($_POST['comment_msg'])) {
			  	$postId= $_POST['postIdd'];
				$message= $_POST['comment_msg'];
				//$comment_msg = $_GET ['comment_msg'];
				$reciverId = $_POST['userIdd'];
				$strc = "insert into comment(postid,senderUserId,message,reciverUserId) values('$postId','$userId','$message','$reciverId')";
				$resultC=  $database->addUserData($strc);
				if($resultC){
				?>
				<script type="text/javascript">
				//window.location="home.php";
				</script>
				<?php 
				}
				else{
					
				}
			}
			?>
<?php include_once 'elements/HomeElem.php'; ?>
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
                                 
                              <li><a href="#"><i class="fa fa-envelope"> </i><span class="badge  "  
                              data-toggle="tooltip" data-placement="bottom" title="Messages">2</span></a></li> 
                              
                                    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

					<li><a href="#" class="nav-controller"><i class="fa fa-comment"></i>Chat</a></li>
					<li><a href="logout.php?message=logout sucessfully"
						class="nav-controller"><i class="fa fa-comment"></i>Logout</a></li>

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
	background: url('img/Cover/cover.jpg');
	background-color: #435e9c;
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
	color: white;
	height: 315px;
}
</style>
<?php  

$getImage = $database->getDataList("select *from  profile where userId='$userId'");
$image = $getImage->fetch_assoc();
?>
				<div class="cover-photo">
					<img src="<?php  echo $image['profileImage']; ?>"
						class="profile-photo img-thumbnail show-in-modal">
					<div class="cover-name"><?php echo ucwords($_SESSION['firstName'] ." " .$_SESSION['lastName']);?></div>
				</div>
			</div>




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
				<div class="col-md-5 col-sm-5 col-xs-12 col-detail">
					<div class="col-md-12">
						<div class="panel panel-default panel-user-detail">
							<div class="panel-body">
								<ul class="list-unstyled">
									<li><i class="fa fa-suitcase"></i>Works at <a href="#">software
											development</a></li>
									<li><i class="fa fa-calendar"></i>Born on August 12, 1991</li>
									<li><i class="fa fa-rss"></i>Followed by <a href="#">51 People</a></li>
								</ul>
							</div>
							<div class="panel-footer text-center">
								<a href="#" class="btn btn-success">Read more...</a>
							</div>
						</div>
					</div>



					<div class="col-md-12">
						<div class="panel panel-default panel-friends">
							<div class="panel-heading">
								<a href="#" class="pull-right">View all&nbsp;<i
									class="fa fa-share-square-o"></i></a>
								<h3 class="panel-title">
									<i class="fa fa-users"></i>&nbsp; Friends
								</h3>
							</div>
                                                   <?php
                                                   
                                                $getFriendList =    $database->getDataList("Select *from sendfriendrequest  where  friendId='$userId' and status='yes'");
                                                   
                                                ?>
							<div class="panel-body text-center">
								<ul class="friends">
                                                                    <?php
                                                                    
                                                                     if($getFriendList){
                                                        while($getFRows=$getFriendList->fetch_assoc()){
                                                            $sendId = $getFRows['senderId'];
                                                        $getFrirndPhoto= $database->getDataList("Select *from profile where  userId='$sendId'");
                                                             if($getFrirndPhoto){
                                                                 $friendPhotoRow  =$getFrirndPhoto->fetch_assoc();
                                                                    ?>
									<li><a href="#"> <img src="<?php echo $friendPhotoRow['profileImage'] ?>"
											title="Jhoanath matew" class="img-responsive tip">
									</a></li>
                                                                        <?php
                                                                          }
                                                        }
                                                             } else{
                                                                 
                                                                 
                                                                     
                                                                        ?>
									
								</ul>
                                                            <div class="alert alert-danger" role="alert">
                                                                <strong>No Friend</strong>
            </div>
                                                            <?php 
                                                             }?>
							</div>
						</div>
					</div>



					<div class="col-md-12">
						<div class="panel panel-default panel-likes">
							<div class="panel-heading">
								<h3 class="panel-title">
									<i class="fa fa-thumbs-o-up"></i>&nbsp;Likes
								</h3>
							</div>
							<div class="panel-body">
								<div id="carousel-example-generic" class="carousel slide"
									data-ride="carousel" data-interval="">
									<ol class="carousel-indicators">
										<li data-target="#carousel-example-generic" data-slide-to="0"
											class="active"></li>
										<li data-target="#carousel-example-generic" data-slide-to="1"></li>
										<li data-target="#carousel-example-generic" data-slide-to="2"></li>
									</ol>
									<div class="carousel-inner" role="listbox-likes">
										<div class="item active">
											<div class="row">
												<div class="col-md-6 col-sm-6 col-xs-3">
													<a href="#" class="thumbnail"><img
														src="img/Likes/likes-5.png" alt="Like"></a>
												</div>
												<div class="col-md-6 col-sm-6 col-xs-3">
													<a href="#" class="thumbnail"><img
														src="img/Likes/likes-6.png" alt="Like"></a>
												</div>
												<div class="col-md-6 col-sm-6 col-xs-3">
													<a href="#" class="thumbnail"><img
														src="img/Likes/likes-1.png" alt="Like"></a>
												</div>
												<div class="col-md-6 col-sm-6 col-xs-3">
													<a href="#" class="thumbnail"><img
														src="img/Likes/likes-2.png" alt="Like"></a>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="row">
												<div class="col-md-6 col-sm-6 col-xs-3">
													<a href="#" class="thumbnail"><img
														src="img/Likes/likes-3.png" class="show-in-modal"
														alt="Like"></a>
												</div>
												<div class="col-md-6 col-sm-6 col-xs-3">
													<a href="#" class="thumbnail"><img
														src="img/Likes/likes-4.png" class="show-in-modal"
														alt="Like"></a>
												</div>
												<div class="col-md-6 col-sm-6 col-xs-3">
													<a href="#" class="thumbnail"><img
														src="img/Likes/likes-5.png" class="show-in-modal"
														alt="Like"></a>
												</div>
												<div class="col-md-6 col-sm-6 col-xs-3">
													<a href="#" class="thumbnail"><img
														src="img/Likes/likes-6.png" class="show-in-modal"
														alt="Like"></a>
												</div>
											</div>
										</div>
									</div>
									<a class="left carousel-control"
										href="#carousel-example-generic" role="button"
										data-slide="prev"> <span
										class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a> <a class="right carousel-control"
										href="#carousel-example-generic" role="button"
										data-slide="next"> <span
										class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
							<?php 
									$ph= "select *from posts  where userId='$userId' and  image <> 'upload/' LIMIT 6 ";
								    $photo = $database->getDataList($ph);
								    if($photo){
								    	
									?>
									
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="viewAllPhoto.php" class="pull-right">View all&nbsp;<i
									class="fa fa-share-square-o"></i></a>
								<h3 class="panel-title">
									<i class="fa fa-image"></i>&nbsp;Photos
								</h3>
							</div>
							
							<div class="panel-body text-center">
								<ul class="photos">
								<?php  while ($phot = $photo->fetch_assoc()){ ?>
									<li><a href="#"> <img src="<?php echo $phot['image']; ?>"    alt="<?php echo $phot['userName']; ?>"
											class="img-responsive show-in-modal"  style="width:100%;  height:20% " >
									</a></li>
									<?php }?>
									
								</ul>
							</div>
						</div>
						<?php }?>
					</div>
					<div class="col-md-12 hidden-xs">
						<div class="panel panel-default panel-movies">
							<div class="panel-heading">
								<h3 class="panel-title">
									<i class="fa fa-video-camera"></i>&nbsp;Movies
								</h3>
							</div>
							<div class="panel-body">
								<div id="carousel-movies" class="carousel slide"
									data-ride="carousel" data-interval="false">
									<ol class="carousel-indicators">
										<li data-target="#carousel-movies" data-slide-to="0"
											class="active"></li>
										<li data-target="#carousel-movies" data-slide-to="1"></li>
										<li data-target="#carousel-movies" data-slide-to="2"></li>
									</ol>
									<div class="carousel-inner" role="listbox">
										<div class="item active">
											<img src="img/Movies/movie-1.jpg"
												class="img-responsive show-in-modal img-movie" alt="Movie">
											<div class="carousel-caption">Movie name one</div>
										</div>
										<div class="item">
											<img src="img/Movies/movie-2.jpg"
												class="img-responsive show-in-modal img-movie" alt="Movie">
											<div class="carousel-caption">Movie name two</div>
										</div>
										<div class="item">
											<img src="img/Movies/movie-3.jpg"
												class="img-responsive show-in-modal img-movie" alt="Movie">
											<div class="carousel-caption">Another movie</div>
										</div>
									</div>
									<a class="left carousel-control" href="#carousel-movies"
										role="button" data-slide="prev"> <span
										class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a> <a class="right carousel-control" href="#carousel-movies"
										role="button" data-slide="next"> <span
										class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default panel-groups">
							<div class="panel-heading">
								<h3 class="panel-title">
									<i class="fa fa-users"></i>&nbsp;Groups
								</h3>
							</div>
							<div class="panel-body">
								<ul class="list-group">
									<li class="list-group-item">
										<div class="col-xs-3 col-sm-6 col-md-3">
											<img src="img/Likes/likes-5.png" alt="Group"
												class="img-responsive img-circle" />
										</div>
										<div class="col-xs-9 col-sm-6">
											<span class="name">Bootdey competitors</span>
										</div>
										<div class="clearfix"></div>
									</li>
									<li class="list-group-item">
										<div class="col-xs-3 col-sm-6 col-md-3">
											<img src="img/Likes/likes-1.png" alt="Group"
												class="img-responsive img-circle" />
										</div>
										<div class="col-xs-9 col-sm-6">
											<span class="name">Git in action</span>
										</div>
										<div class="clearfix"></div>
									</li>
									<li class="list-group-item">
										<div class="col-xs-3 col-sm-6 col-md-3">
											<img src="img/Likes/likes-6.png" alt="Group"
												class="img-responsive img-circle" />
										</div>
										<div class="col-xs-9 col-sm-6">
											<span class="name">Bootdey Snippets</span>
										</div>
										<div class="clearfix"></div>
									</li>
									<li class="list-group-item">
										<div class="col-xs-3 col-sm-6 col-md-3">
											<img src="img/Likes/likes-2.png" alt="Group"
												class="img-responsive img-circle" />
										</div>
										<div class="col-xs-9 col-sm-6">
											<span class="name">Html 5 live</span>
										</div>
										<div class="clearfix"></div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-12 col-posts">
					<div class="col-md-12">
						<div class="well">
							<form class="form-horizontal" role="form" method="post"
								enctype="multipart/form-data">
								<h4>What's New</h4>
								<div class="form-group" style="padding: 14px;">
									<textarea class="form-control" name="status" required
										placeholder="Update your status"></textarea>
								</div>



								<ul class="list-inline">

									<li>
										<div class="picture-container">
											<div class="picture">

												<img src="" width="20%" height="8%" class="picture-src"
													id="wizardPicturePreview" 
													title="" /> <input type="file" id="wizard-picture"
													name="file">
											</div>
										</div>
									</li>
									<input type="submit" class="btn btn-primary pull-right"
										name="post_status" value="Post">
									<br>
									<br>
									<select class="selectpicker show-menu-arrow" name="privacy">
										<option>private</option>
										<option>public</option>
                                                                                <?php  if(isset($_SESSION['userRole'])){
                                                                                    $role = $_SESSION['userRole'];
                                                                                    if($role=="teacher"){
                                                                                   ?>     
										<option>Students</option>
										<?php 
                                                                                
                                                                                    }
                                                                                }
                                                                                ?>
                                                                                <option>Teachers</option>
									</select>
								</ul>

							</form>
						</div>
					</div>
					<?php
	
	if ($allPost) {
		while ( $rows = $allPost->fetch_assoc () ) {
			
			?>
					<div class="col-md-12">
						<div class="panel panel-white post panel-shadow">
							<div class="post-heading">
								<div class="pull-left image">
								  <?php
			$postuserId = $rows ['userId'];
			$profile = $database->getDataList ( "select *from  profile where  userId='$postuserId'" );
			if ($profile) {
				$prof = $profile->fetch_assoc ();
				?>
									<img src="<?php echo $prof['profileImage']; ?>"
										class="img-rounded avatar" alt="user profile image">
										<?php }else{?>
									<img
										src="<?php echo SITEURL."img/Profile/default-avatar.png"; ?>"
										class="img-rounded avatar" alt="user profile image">
										
										<?php }?>
								</div>
								<div class="pull-left meta">
									<div class="title h5">
										<a href="#" class="post-user-name"><?php echo $rows['userName']; ?></a>
										<?php if($rows['image']=="upload/"){?>
										Post a Status.
										<?php }else{?>
										   Upload a photo
										<?php }?>
									</div>
									<h6 class="text-muted time"><?php  echo date('H:i', strtotime($rows['time'])); ?> ago</h6>
								</div>
							</div>
							<?php if($rows['image']!="upload/"){?>
							<div class="post-image">
								<img src="<?php echo $rows['image'];?>"
									class="image show-in-modal" alt="image post">
							</div>
							<?php } ?>
							<div class="post-description">

								<p><?php echo $rows['status']; ?></p>
								<div class="stats">
								   <?php 
								  $pid= $rows['postId'];
								    $res = $database->getDataList("select sum(numberOfLikes) as idd from poststatus where userId='$userId'
								    		and postId='$pid' ");
								    if($res){
								    $likes = $res->fetch_assoc();
								    $dis  ="select *from poststatus where postId='$pid'  and userId='$userId' and numberOfLikes=1";
								    $check = $database->isDataExist($dis);
								    if($check){
								    
								    ?>
									<a href="sendData.php?like=1&postId=<?php echo $rows['postId'];  ?>
									 & senderId=<?php echo $userId;?>&recvierId=<?php echo $rows['userId'];?>" class="btn btn-default stat-item"  disabled> <i
										class="fa fa-thumbs-up icon"></i> <?php  echo $likes['idd']; ?>
										
								    <?php }
								    else{?>
								    	
								    	<a href="sendData.php?like=1&postId=<?php echo $rows['postId'];  ?>
									 & senderId=<?php echo $userId;?>&recvierId=<?php echo $rows['userId'];?>" class="btn btn-default stat-item"  > <i
										class="fa fa-thumbs-up icon"></i> <?php  echo $likes['idd']; ?>
										
								   <?php  }
								    }?>
								    
									</a> 
									 <?php 
								  $pid= $rows['postId'];
								    $res = $database->getDataList("select sum(numberOfDisLikes) as idd from poststatus where userId='$userId'
								    		and postId='$pid' ");
								    if($res){
								    $dislikes = $res->fetch_assoc();
								     $dis  ="select *from poststatus where postId='$pid'  and userId='$userId' and numberOfDisLikes=1";
								     $check = $database->isDataExist($dis);
								     if($check){
								     	
								    ?>
									<a href="sendDisLikes.php?dislike=1&postId=<?php echo $rows['postId'];  ?>
									 & senderId=<?php echo $userId;?>&recvierId=<?php echo $rows['userId'];?>" class="btn btn-default stat-item " disabled> <i
										class="fa fa-thumbs-down icon"></i> <?php echo $dislikes['idd']; ?>
									</a>
									<?php }
									else{?>
										<a href="sendDisLikes.php?dislike=1&postId=<?php echo $rows['postId'];  ?>
												& senderId=<?php echo $userId;?>&recvierId=<?php echo $rows['userId'];?>" class="btn btn-default stat-item " > <i
																				class="fa fa-thumbs-down icon"></i> <?php echo $dislikes['idd']; ?>
																			</a>
							<?php 
											}
									
								     }?>
								</div>
							</div>
						
							<form method='post'>
								<div class="post-footer">
									<div class="input-group">
										<input class="form-control" name="comment_msg"
											placeholder="Add a comment" type="text"> <span
											class="input-group-addon">
											<input type="submit" class="btn btn-default btn-xs"
												name="comment_p" value="post">
												
											
										</span>
										<input type="hidden" name="postIdd" value="<?php echo $rows['postId'];?>" >
										<input type="hidden" name="userIdd" value="<?php echo $rows['userId'];?>" >
									</div>
									</form>
									<?php 
									$id = $rows['postId'];
									 $getcomment = "select *from comment where postId='$id'";
									 $comnt = $database->getDataList($getcomment);
									 if($comnt){
									 while($row=$comnt->fetch_assoc()){
									?>
									<ul class="comments-list">
										<li class="comment"><a class="pull-left" href="#"> <img
												class="avatar" src="img/Friends/guy-4.jpg" alt="avatar">
										</a>
											<div class="comment-body">
												<div class="comment-heading">
													<h4 class="comment-user-name">
														<a href="#">Markton contz</a>
													</h4>
													<h5 class="time"><?php  echo date('H:i', strtotime($row['time'])); ?></h5>
												</div>
												<p><?php echo $row['message'];?></p>
											</div></li>
									</ul>
									<?php }}?>
								</div>
							
						</div>
					</div>
					<?php
		}
	}
	?>
					
					
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2 col-sm-3 sponsor-container">
		<div class="row">
			<div class="col-md-12">
				<p>
					<i class="fa fa-volume-up"></i> Sponsored
				</p>
				<div style="border: 1px solid #3b5998"></div>
			</div>
			<div class="col-md-12 sponsor-list">
				<img src="img/Sponsor/sponsor-1.jpg"
					class="img-responsive img-rounded show-in-modal">
				<p class="sponsor-name">Bootdey</p>
				<p class="sponsor-url">
					<a href="http://bootdey.com/">bootdey.com</a>
				</p>
				<p class="sponsor-description">Gallery of free snippets and
					resources for Bootstrap Html Css Js framework</p>
			</div>
			<div class="col-md-12 sponsor-list">
				<img src="img/Sponsor/sponsor-2.png"
					class="img-responsive img-rounded show-in-modal">
				<p class="sponsor-name">Bootdey</p>
				<p class="sponsor-url">
					<a href="http://bootdey.com/">bootdey.com</a>
				</p>
				<p class="sponsor-description">Gallery of free snippets and
					resources for Bootstrap Html Css Js framework</p>
			</div>
		</div>
	</div>
	<div class="chat-sidebar focus">
		<div class="list-group text-left">
			<p class="text-center visible-xs">
				<a href="#" class="hide-chat">Hide chat</a>
			</p>
			<p class="text-center chat-title">
				<i class="fa fa-weixin">Chat</i>
			</p>
			<a href="#" class="list-group-item"> <i
				class="fa fa-check-circle connected-status"></i> <img
				src="img/Friends/guy-2.jpg" class="img-chat img-thumbnail">
				<p class="chat-user-name">Jeferh Smith</p></a> <a href="#"
				class="list-group-item"> <i class="fa fa-times-circle absent-status"></i>
				<img src="img/Friends/woman-1.jpg" class="img-chat img-thumbnail">
				<p class="chat-user-name">Dapibus acatar</p></a> <a href="#"
				class="list-group-item"> <i
				class="fa fa-check-circle connected-status"></i> <img
				src="img/Friends/guy-3.jpg" class="img-chat img-thumbnail">
				<p class="chat-user-name">Antony andrew lobghi</p></a> <a href="#"
				class="list-group-item"> <i
				class="fa fa-check-circle connected-status"></i> <img
				src="img/Friends/woman-2.jpg" class="img-chat img-thumbnail">
				<p class="chat-user-name">Maria fernanda coronel</p></a> <a href="#"
				class="list-group-item"> <i
				class="fa fa-check-circle connected-status"></i> <img
				src="img/Friends/guy-4.jpg" class="img-chat img-thumbnail">
				<p class="chat-user-name">Markton contz</p></a> <a href="#"
				class="list-group-item"> <i class="fa fa-times-circle absent-status"></i>
				<img src="img/Friends/woman-3.jpg" class="img-chat img-thumbnail">
				<p class="chat-user-name">Martha creaw</p></a> <a href="#"
				class="list-group-item"> <i class="fa fa-times-circle absent-status"></i>
				<img src="img/Friends/woman-8.jpg" class="img-chat img-thumbnail">
				<p class="chat-user-name">Yira Cartmen</p></a> <a href="#"
				class="list-group-item"> <i
				class="fa fa-check-circle connected-status"></i> <img
				src="img/Friends/woman-4.jpg" class="img-chat img-thumbnail">
				<p class="chat-user-name">Jhoanath matew</p></a> <a href="#"
				class="list-group-item"> <i
				class="fa fa-check-circle connected-status"></i> <img
				src="img/Friends/woman-5.jpg" class="img-chat img-thumbnail">
				<p class="chat-user-name">Ryanah Haywofd</p></a> <a href="#"
				class="list-group-item"> <i
				class="fa fa-check-circle connected-status"></i> <img
				src="img/Friends/woman-9.jpg" class="img-chat img-thumbnail">
				<p class="chat-user-name">Linda palma</p></a> <a href="#"
				class="list-group-item"> <i
				class="fa fa-check-circle connected-status"></i> <img
				src="img/Friends/woman-10.jpg" class="img-chat img-thumbnail">
				<p class="chat-user-name">Andrea ramos</p></a> <a href="#"
				class="list-group-item"> <i
				class="fa fa-check-circle connected-status"></i> <img
				src="img/Friends/child-1.jpg" class="img-chat img-thumbnail">
				<p class="chat-user-name">Dora ty bluekl</p></a>
		</div>
	</div>
	<div class="chat-window col-xs-10 col-md-3 col-sm-8 col-md-offset-5">
		<div class="col-xs-12 col-md-12 col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading top-bar">
					<div class="col-md-8 col-xs-8">
						<h3 class="panel-title">
							<span class="glyphicon glyphicon-comment"></span>Dapibus acatar
						</h3>
					</div>
					<div class="col-md-4 col-xs-4" style="text-align: right;">
						<a href="#"><span id="minim_chat_window"
							class="glyphicon glyphicon-minus icon_minim"></span></a> <a
							href="#"><span class="glyphicon glyphicon-remove icon_close"></span></a>
					</div>
				</div>
				<div class="panel-body msg_container_base">
					<div class="row msg_container base_sent">
						<div class="col-md-10 col-xs-10">
							<div class="messages msg_sent">
								<p>Hi!</p>
								<time>51 min</time>
							</div>
						</div>
						<div class="col-md-2 col-xs-2 avatar-chat-box">
							<img src="img/Profile/profile.jpg" class=" img-responsive ">
						</div>
					</div>
					<div class="row msg_container base_receive">
						<div class="col-md-2 col-xs-2 avatar-chat-box">
							<img src="img/Friends/woman-1.jpg" class=" img-responsive ">
						</div>
						<div class="col-md-10 col-xs-10">
							<div class="messages msg_receive">
								<p>Hello my friend</p>
								<time>51 min</time>
							</div>
						</div>
					</div>
					<div class="row msg_container base_receive">
						<div class="col-md-2 col-xs-2 avatar-chat-box">
							<img src="img/Friends/woman-1.jpg" class=" img-responsive ">
						</div>
						<div class="col-xs-10 col-md-10">
							<div class="messages msg_receive">
								<p>How are you?</p>
								<time>51 min</time>
							</div>
						</div>
					</div>
					<div class="row msg_container base_sent">
						<div class="col-xs-10 col-md-10">
							<div class="messages msg_sent">
								<p>I'm fine, and you?</p>
								<time>51 min</time>
							</div>
						</div>
						<div class="col-md-2 col-xs-2 avatar-chat-box">
							<img src="img/Profile/profile.jpg" class=" img-responsive ">
						</div>
					</div>
					<div class="row msg_container base_receive">
						<div class="col-md-2 col-xs-2 avatar-chat-box">
							<img src="img/Friends/woman-1.jpg" class=" img-responsive ">
						</div>
						<div class="col-xs-10 col-md-10">
							<div class="messages msg_receive">
								<p>Bootstrap is the most popular HTML, CSS, and JS framework for
									developing responsive, mobile first projects on the web</p>
								<time> 51 min</time>
							</div>
						</div>
					</div>
					<div class="row msg_container base_sent">
						<div class="col-md-10 col-xs-10 ">
							<div class="messages msg_sent">
								<p>Bootstrap makes front-end web development faster and easier.
									It's made for folks of all skill levels, devices of all shapes,
									and projects of all sizes.</p>
								<time>51 min</time>
							</div>
						</div>
						<div class="col-md-2 col-xs-2 avatar-chat-box">
							<img src="img/Profile/profile.jpg" class=" img-responsive ">
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="input-group">
						<input id="btn-input" type="text"
							class="form-control input-sm chat_input"
							placeholder="Write your message here..." /> <span
							class="input-group-btn">
							<button class="btn btn-primary btn-sm" id="btn-chat">Send</button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="modal-show" class="modal modal-message modal-primary fade"
		style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<i class="fa fa-image"></i>
				</div>
				<div class="modal-body text-center">
					<div class="img-content"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<footer class="footer">
			<P>&copy; Company 2015</P>
		</footer>
	</div>
</body>
<!-- Mirrored from demos.bootdey.com/dayday/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Jan 2016 18:50:32 GMT -->
</html>
<?php
} else {
	header ( "Location: index.php" );
}
?>