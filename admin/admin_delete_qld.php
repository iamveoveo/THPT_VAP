<?php
 include("template/header.php"); 
?>
<!-- quanlixoadiem -->
<?php
  $id1 = $_GET['Student_UserID'];
  $sql1 = "DELETE FROM transcript WHERE Student_UserID=$id1";
  $result1 = mysqli_query($conn, $sql1);    
  if ($conn->query($sql1) === TRUE) {
    echo "Record deleted successfully";
    header('location:http://localhost/thpt_vap/admin/admin-qld.php');
  } else {
    echo "Error deleting record: " . $conn->error;
    header('location:http://localhost/thpt_vap/admin/admin-qld.php');
  }
  $conn->close();
  
?>
