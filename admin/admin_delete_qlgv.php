<?php
 include("template/header.php"); 
?>
<?php

// trang quanlixoagv
  //lấy id là TeachID
  $id = $_GET['UserID'];
  
  $sql1 = "delete from mess where ToUserID = '$id' or FromUserID = '$id'";
  $res1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

  if($res1){
    $sql2 = "delete from teach where Teacher_UserID = '$id'";
    $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));

    if($res2){
      $sql = "DELETE FROM users WHERE UserID=$id";
      $result = mysqli_query($conn, $sql);

      if ($conn->query($sql) === TRUE) {
        $_SESSION['delete'] = "<span class='text-success'>Xóa thành công</span>";
        header('location:'.SITEURL.'admin/admin-qlgv.php');
      } else {
        $_SESSION['delete'] = "<span class='text-danger'>Xóa thất bại</span>";
        header('location:'.SITEURL.'admin/admin-qlgv.php');
      }
      $conn->close();
    }else {
      $_SESSION['delete'] = "<span class='text-danger'>Xóa thất bại</span>";
      header('location:'.SITEURL.'admin/admin-qlgv.php');
    }
  }else {
    $_SESSION['delete'] = "<span class='text-danger'>Xóa thất bại</span>";
    header('location:'.SITEURL.'admin/admin-qlgv.php');
  }  
?> 
