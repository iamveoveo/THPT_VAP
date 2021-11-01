<?php
echo $_POST['UserRName'];
echo $_POST['UserName'];
echo $_POST['UserPassword'];
echo $_POST['UserTel'];
echo $_POST['UserAdd'];
echo $_POST['UserBirth'];
echo $_POST['UserGender'];
?>
<?php  
 //fetch.php  
 include("template/header.php");
 if(isset($_POST["UserID"]))  
 {  
      $query = "SELECT * FROM users WHERE id = '".$_POST["UserID"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 