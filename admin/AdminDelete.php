<?php
 include("template/header.php"); 
?>
<?php

// trang quanlihocsinh
    //B1:Lấy giá trị và lưu vào biến
        $UserName = $_POST['UserName'];
        $UserEmail = $_POST['UserEmail'];
        $UserTel = $_POST['UserTel'];
        $UserAdd = $_POST['UserAdd'];
        $UserGender = $_POST['UserGender'];
        $UserBirth = $POST['UserBirth'];
        $UserClass = $POST['UserClass'];   
   //lấy id là TeachID
    $id = $_GET['TeachID'];

    //2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM teach WHERE TeachID=$id";
 
    //Execute the Query
    $result = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
      $conn->close();
?>

<?php
include('footer.php');
?>