<?php session_start(); ?>
<?php  include_once 'config/config.php'; ?>
<?php  include_once 'libraries/Database.php';?>
<?php

if (isset ( $_SESSION ['email'] ) && isset ( $_SESSION ['userId'] )) {
	?>
<!DOCTYPE html>
<html>
<!-- Mirrored from demos.bootdey.com/dayday/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Jan 2016 18:49:24 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="bootstrap social network template">
<meta name="author" content="">
<title>Day-Day social network</title>

<link href="bootstrap-3.3.4/css/bootstrap.min.css" rel="stylesheet"
	media="screen">
<link href="font-awesome-4.3.0/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
<link href="assets/css/animate.min.css" rel="stylesheet" media="screen">
<link href="assets/css/dayday/dayday.css" rel="stylesheet"
	media="screen">
<link href="assets/css/dayday/timeline.css" rel="stylesheet"
	media="screen">
<link href="assets/css/dayday/big-cover.css" rel="stylesheet"
	media="screen">
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap-3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/dayday/dayday.js"></script>

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
				<a class="navbar-brand" href="index-2.html"> <b>Day-Day</b></a>
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
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-expanded="true"> <i
							class="fa fa-home"></i>Pages <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="home.html">Home</a></li>
							<li><a href="index-2.html">Timeline 1</a></li>
							<li><a href="time-line2.html">Timeline 2</a></li>
							<li><a href="blank-profile.html">Blank profile</a></li>
							<li><a href="register.html">Register</a></li>
							<li><a href="login.html">Login</a></li>
							<li><a href="error404.html">Error 404</a></li>
							<li><a href="error500.html">Error 500</a></li>
						</ul></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-expanded="true"> <i
							class="fa fa-user"></i>Nickson <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">One option</a></li>
							<li><a href="#">Another option</a></li>
							<li class="divider"></li>
							<li><a href="#">Profile</a></li>
							<li><a href="#">Logout</a></li>
						</ul></li>
					<li><a href="#" class="nav-controller"><i class="fa fa-comment"></i>Chat</a></li>
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
				<div class="cover-photo">
					<img src="img/Profile/profile.jpg"
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
									<li class="active"><a href="#"><i class="fa fa-tasks"></i>Timeline</a></li>
									<li><a href="about.html"><i class="fa fa-info-circle"></i>About</a></li>
									<li><a href="friends.html"><i class="fa fa-users"></i>Friends</a></li>
									<li><a href="photos.html"><i class="fa fa-file-image-o"></i>Photos</a></li>
									<li><a href="messages.html"><i class="fa fa-comment"></i>Messages</a></li>
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
							<div class="panel-body text-center">
								<ul class="friends">
									<li><a href="#"> <img src="img/Friends/woman-4.jpg"
											title="Jhoanath matew" class="img-responsive tip">
									</a></li>
									<li><a href="#"> <img src="img/Friends/woman-3.jpg"
											title="Martha creawn" class="img-responsive tip">
									</a></li>
									<li><a href="#"> <img src="img/Friends/guy-2.jpg"
											title="Jeferh smith" class="img-responsive tip">
									</a></li>
									<li><a href="#"> <img src="img/Friends/woman-9.jpg"
											title="Linda palma" class="img-responsive tip">
									</a></li>
									<li><a href="#"> <img src="img/Friends/guy-9.jpg"
											title="Lindo polmo" class="img-responsive tip">
									</a></li>
									<li><a href="#"> <img src="img/Friends/guy-5.jpg"
											title="andrew cartson" class="img-responsive tip">
									</a></li>
								</ul>
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
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="#" class="pull-right">View all&nbsp;<i
									class="fa fa-share-square-o"></i></a>
								<h3 class="panel-title">
									<i class="fa fa-image"></i>&nbsp;Photos
								</h3>
							</div>
							<div class="panel-body text-center">
								<ul class="photos">
									<li><a href="#"> <img src="img/Photos/1.jpg" alt="photo 1"
											class="img-responsive show-in-modal">
									</a></li>
									<li><a href="#"> <img src="img/Photos/2.jpg" alt="photo 2"
											class="img-responsive show-in-modal">
									</a></li>
									<li><a href="#"> <img src="img/Photos/3.jpg" alt="photo 3"
											class="img-responsive show-in-modal">
									</a></li>
									<li><a href="#"> <img src="img/Photos/4.jpg" alt="photo 4"
											class="img-responsive show-in-modal">
									</a></li>
									<li><a href="#"> <img src="img/Photos/5.jpg" alt="photo 5"
											class="img-responsive show-in-modal">
									</a></li>
									<li><a href="#"> <img src="img/Photos/6.jpg" alt="photo 6"
											class="img-responsive show-in-modal">
									</a></li>
								</ul>
							</div>
						</div>
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
							<form class="form-horizontal" role="form">
								<h4>What's New</h4>
								<div class="form-group" style="padding: 14px;">
									<textarea class="form-control" name="status" required placeholder="Update your status"></textarea>
								</div>
								
								
								
								<ul class="list-inline">
								   
									<li> <div class="picture-container">
                          <div class="picture">
                            <img src="img/Profile/default-avatar.png" width="20%" class="picture-src" id="wizardPicturePreview" title=""/>
                            <input type="file" id="wizard-picture" name=>
                          </div>
                        </div> </li>
									<input type="submit" class="btn btn-primary pull-right" name="post_status" value="Post">
									<select class="selectpicker show-menu-arrow" name="status">
									<option>private</option>
									<option>public</option>
									<option>Students</option>
									<option>Teachers</option>
								</select>
								</ul>
								
							</form>
						</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-white post panel-shadow">
							<div class="post-heading">
								<div class="pull-left image">
									<img src="img/Profile/profile.jpg" class="img-rounded avatar"
										alt="user profile image">
								</div>
								<div class="pull-left meta">
									<div class="title h5">
										<a href="#" class="post-user-name">Nickson Bejarano</a>
										uploaded a photo.
									</div>
									<h6 class="text-muted time">5 seconds ago</h6>
								</div>
							</div>
							<div class="post-image">
								<img src="img/Post/place1-full.jpg" class="image show-in-modal"
									alt="image post">
							</div>
							<div class="post-description">
								<p>This is a short description</p>
								<div class="stats">
									<a href="#" class="btn btn-default stat-item"> <i
										class="fa fa-thumbs-up icon"></i> 228
									</a> <a href="#" class="btn btn-default stat-item"> <i
										class="fa fa-share icon"></i> 128
									</a>
								</div>
							</div>
							<div class="post-footer">
								<div class="input-group">
									<input class="form-control" placeholder="Add a comment"
										type="text"> <span class="input-group-addon"> <a href="#"><i
											class="fa fa-edit"></i></a>
									</span>
								</div>
								<ul class="comments-list">
									<li class="comment"><a class="pull-left" href="#"> <img
											class="avatar" src="img/Friends/guy-3.jpg" alt="avatar">
									</a>
										<div class="comment-body">
											<div class="comment-heading">
												<h4 class="comment-user-name">
													<a href="#">Antony andrew lobghi</a>
												</h4>
												<h5 class="time">7 minutes ago</h5>
											</div>
											<p>This is a comment bla bla bla</p>
										</div></li>
									<li class="comment"><a class="pull-left" href="#"> <img
											class="avatar" src="img/Friends/guy-2.jpg" alt="avatar">
									</a>
										<div class="comment-body">
											<div class="comment-heading">
												<h4 class="comment-user-name">
													<a href="#">Jeferh Smith</a>
												</h4>
												<h5 class="time">3 minutes ago</h5>
											</div>
											<p>This is another comment bla bla bla</p>
										</div></li>
									<li class="comment"><a class="pull-left" href="#"> <img
											class="avatar" src="img/Friends/woman-2.jpg" alt="avatar">
									</a>
										<div class="comment-body">
											<div class="comment-heading">
												<h4 class="comment-user-name">
													<a href="#">Maria fernanda coronel</a>
												</h4>
												<h5 class="time">10 seconds ago</h5>
											</div>
											<p>Wow! so cool my friend</p>
										</div></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-white post panel-shadow">
							<div class="post-heading">
								<div class="pull-left image">
									<img src="img/Profile/profile.jpg" class="img-rounded avatar"
										alt="user profile image">
								</div>
								<div class="pull-left meta">
									<div class="title h5">
										<a href="#" class="post-user-name">Nickson Bejarano</a> made a
										post.
									</div>
									<h6 class="text-muted time">1 minute ago</h6>
								</div>
							</div>
							<div class="post-description">
								<p>Bootdey is a gallery of free snippets resources templates and
									utilities for bootstrap css hmtl js framework. Codes for
									developers and web designers</p>
								<div class="stats">
									<a href="#" class="btn btn-default stat-item"> <i
										class="fa fa-thumbs-up icon"></i>2
									</a> <a href="#" class="btn btn-default stat-item"> <i
										class="fa fa-share icon"></i>12
									</a>
								</div>
							</div>
							<div class="post-footer">
								<div class="input-group">
									<input class="form-control" placeholder="Add a comment"
										type="text"> <span class="input-group-addon"> <a href="#"><i
											class="fa fa-edit"></i></a>
									</span>
								</div>
								<ul class="comments-list">
									<li class="comment"><a class="pull-left" href="#"> <img
											class="avatar" src="img/Friends/guy-8.jpg" alt="avatar">
									</a>
										<div class="comment-body">
											<div class="comment-heading">
												<h4 class="comment-user-name">
													<a href="#">Gavhin dahg martb</a>
												</h4>
												<h5 class="time">5 minutes ago</h5>
											</div>
											<p>This is a first comment</p>
										</div>
										<ul class="comments-list">
											<li class="comment"><a class="pull-left" href="#"> <img
													class="avatar" src="img/Friends/woman-5.jpg" alt="avatar">
											</a>
												<div class="comment-body">
													<div class="comment-heading">
														<h4 class="comment-user-name">
															<a href="#">Ryanah Haywofd</a>
														</h4>
														<h5 class="time">3 minutes ago</h5>
													</div>
													<p>Relax my friend</p>
												</div></li>
											<li class="comment"><a class="pull-left" href="#"> <img
													class="avatar" src="img/Friends/woman-7.jpg" alt="avatar">
											</a>
												<div class="comment-body">
													<div class="comment-heading">
														<h4 class="comment-user-name">
															<a href="#">Maria dh heart</a>
														</h4>
														<h5 class="time">3 minutes ago</h5>
													</div>
													<p>Ok, cool.</p>
												</div></li>
										</ul></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-white post panel-shadow">
							<div class="post-heading">
								<div class="pull-left image">
									<img src="img/Profile/profile.jpg" class="img-rounded avatar"
										alt="user profile image">
								</div>
								<div class="pull-left meta">
									<div class="title h5">
										<a href="#" class="post-user-name">Nickson Bejarano</a>
										uploaded a photo.
									</div>
									<h6 class="text-muted time">5 seconds ago</h6>
								</div>
							</div>
							<div class="post-image">
								<img src="img/Post/staticmap.png" class="image show-in-modal"
									alt="image post">
							</div>
							<div class="post-description">
								<p>I am visiting a new place on the globe</p>
								<div class="stats">
									<a href="#" class="btn btn-default stat-item"> <i
										class="fa fa-thumbs-up icon"></i> 228
									</a> <a href="#" class="btn btn-default stat-item"> <i
										class="fa fa-share icon"></i> 128
									</a>
								</div>
							</div>
							<div class="post-footer">
								<div class="input-group">
									<input class="form-control" placeholder="Add a comment"
										type="text"> <span class="input-group-addon"> <a href="#"><i
											class="fa fa-edit"></i></a>
									</span>
								</div>
								<ul class="comments-list">
									<li class="comment"><a class="pull-left" href="#"> <img
											class="avatar" src="img/Friends/guy-4.jpg" alt="avatar">
									</a>
										<div class="comment-body">
											<div class="comment-heading">
												<h4 class="comment-user-name">
													<a href="#">Markton contz</a>
												</h4>
												<h5 class="time">7 minutes ago</h5>
											</div>
											<p>this is a good place, and this is a comment</p>
										</div></li>
									<li class="comment"><a class="pull-left" href="#"> <img
											class="avatar" src="img/Friends/woman-8.jpg" alt="avatar">
									</a>
										<div class="comment-body">
											<div class="comment-heading">
												<h4 class="comment-user-name">
													<a href="#">Yira Cartmen</a>
												</h4>
												<h5 class="time">3 minutes ago</h5>
											</div>
											<p>Ya vamos llegando a penjamo, ja ja ja buena suerte!</p>
										</div></li>
									<li class="comment"><a class="pull-left" href="#"> <img
											class="avatar" src="img/Friends/child-1.jpg" alt="avatar">
									</a>
										<div class="comment-body">
											<div class="comment-heading">
												<h4 class="comment-user-name">
													<a href="#">Dora ty bluekl</a>
												</h4>
												<h5 class="time">10 seconds ago</h5>
											</div>
											<p>Friend, good luck!</p>
										</div></li>
								</ul>
							</div>
						</div>
					</div>
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
	header ( "Location: index.php");
}?>