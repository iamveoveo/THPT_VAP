<?php
 include("template/header.php"); 
?>
<!-- quanlixoaadmin -->
<?php
  $id = $_GET['AdID'];
  
  $sql = "DELETE from admin where AdID='$id'";
  $result = mysqli_query($conn, $sql);    
  if ($conn->query($sql) === TRUE) {
    echo "xóa admin thành công";
    header('location:'.SITEURL.'admin/admin-manager.php');
  } else {
    echo "xóa admin thất bại " . $conn->error;
    header('location:'.SITEURL.'admin/admin-manager.php');
  }
  $conn->close();
  
?>
