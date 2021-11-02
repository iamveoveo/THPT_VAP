<?php
 include("template/header.php"); 
?>
<?php

// trang quanlixoahocsinh
  //lấy id là UserID
  $id = $_GET['UserID'];
  
  $sql1 = "delete from mess where ToUserID = '$id' or FromUserID = '$id'";
  $res1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

  if($res1){
    $sql2 = "delete from transcript where Student_UserID = '$id' or Subject = '$id' ";
    $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));

    if($res2){
      $sql = "DELETE FROM users WHERE UserID=$id";
      $result = mysqli_query($conn, $sql);

      if ($conn->query($sql) === TRUE) {
        $_SESSION['delete'] = "<span class='text-success'>Xóa thành công</span>";
        header('location:'.SITEURL.'admin/admin-qlhs.php');
      } else {
        $_SESSION['delete'] = "<span class='text-danger'>Xóa thất bại</span>";
        header('location:'.SITEURL.'admin/admin-qlhs.php');
      }
      $conn->close();
    }else {
      $_SESSION['delete'] = "<span class='text-danger'>Xóa thất bại</span>";
      header('location:'.SITEURL.'admin/admin-qlhs.php');
    }
  }else {
    $_SESSION['delete'] = "<span class='text-danger'>Xóa thất bại</span>";
    header('location:'.SITEURL.'admin/admin-qlhs.php');
  }  
?> 
