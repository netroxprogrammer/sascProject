<?php session_start();  ?>

<?php
if(isset($_SESSION['email']) && isset($_SESSION['userId']) &&
isset($_SESSION['userRole'])){
 //    include_once 'includes/header.php' ;
include_once '../config/config.php';  
include_once '../libraries/database.php'; 
$database = new Database();

               
               $getid = $_GET['id'];
             $getFile =  $database->getDataList("select *from file where id='$getid'");
             if($getFile){
                 $newsRow = $getFile->fetch_assoc();
               header("Content-Type: ". $newsRow['mime']);
              header("Content-Length: ". $newsRow['size']);
               header("Content-Disposition: attachment; filename=". $newsRow['name']);
             
                echo $newsRow['data'];
                ?>
<script> window.location="ViewDataSheets.php"</script>
<?php
             }
                
}?>