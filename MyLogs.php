<?php
session_start();
include_once 'includes/header.php';
include_once 'config/config.php'; 
include_once 'config/Settings.php';
include_once 'libraries/Database.php';

$database = new Database();
$userId =$_SESSION['userId'];
$allPosts = $database->getDataList("select *from posts where userId='$userId'");

$allComments = $database->getDataList("select *from comment where senderUserId='$userId'");
        if(isset($_GET['postId'])){
    $postId = $_GET['postId'];
    $database->updateData("delete from posts where  postId='$postId'");
    
}
      if(isset($_GET['commentId'])){
    $commentId = $_GET['commentId'];
    $database->updateData("delete from comment where  commentId='$commentId'");
    
}
?>
<style>
    .body {
        background: #d3d3d3;
    }
</style>
<body class="container body">
<div class="row well">
    
    <div class="col-xs-1">
        <a href="home.php">Back</a>
    </div>
    <div class="col-xs-3 col-xs-offset-5">
        <h3>My Activities</h3>
    </div>
    
</div>
<br>
<br>
<strong>My Posts</strong>
<div class="row well">
    <table class="table">
        <thead>
            <tr>
                <th>
                    Status 
                </th>
                <th>Image</th>
                
                <th>
                   Privacy
                </th>
                <th>
                   Time
                </th>
                 <th>
                   Action
                </th>
            </tr>
        </thead>
        <tbody>
            
      <?php
      if($allPosts){
      while($rows = $allPosts->fetch_assoc()){
          ?>
            <tr>
                <td> <?php echo $rows['status']; ?></td>
            <?php  
                if($rows['image']=="upload/"){
                    ?>
                <td> </td>
               <?php 
               
                }else{
            ?>
                <td> <img src="<?php echo $rows['image']; ?>" height="20"> </td>
                <?php }?>   
                <td>
                   
               <?php  if($rows['privacy'] == "private"){
                        ?>
              <span class="glyphicon glyphicon-lock"></span>
                    <?php
                    
               }?>
                <?php  if($rows['privacy'] == "public"){
                        ?>
              <span class="glyphicon glyphicon-globe"></span>
                    <?php
                    
               }?>
                </td>
                <td>
                    <?php  echo $rows["time"];?>
                </td>
                <td>
                    <a href="MyLogs.php?postId=<?php echo  $rows['postId']; ?>">
          <span class="glyphicon glyphicon-remove"></span>
        </a>
                </td>
</tr>
         <?php
         
      }
      
}
      
      ?>
        
        </tbody>
        
    </table>
</div>
<!--
MY COMMENTS
-->
<br>
<br>
<strong>My Comments</strong>
<div class="row well">
    <table class="table">
        <thead>
            <tr>
                <th>
                    Comment
                </th>
                <th>To</th>
                
                <th>
                  Time
                </th>
               <th>
                 Action
                </th>
            </tr>
        </thead>
        <tbody>
            
      <?php
      if($allComments){
      while($commentrow = $allComments->fetch_assoc()){
          ?>
            <tr>
                <td> <?php echo $commentrow['message']; ?></td>
                <td>
                <?php if($commentrow['senderUserId'] ==$userId){
                    ?>
                    Comment Own Post
                <?php }
                else{
                    $getname=$database->getDataList("select *from users where userId='$userId'")->fetch_assoc();
                    echo $getname['firstName']." ".$getname['lastName']; 
                }
                ?>
                </td><td>
                    <?php echo $commentrow['time']; ?>
                </td>
             <td>
                    <a href="MyLogs.php?commentId=<?php echo  $commentrow['commentId']; ?>">
          <span class="glyphicon glyphicon-remove"></span>
        </a>
                </td>
</tr>
         <?php
         
      }
      
}
      
      ?>
        
        </tbody>
        
    </table>
</div>
</body>