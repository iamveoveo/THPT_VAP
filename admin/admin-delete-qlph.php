<?php
 include("template/header.php"); 
?>
<?php
// quanlixoaphuhuynh
//lấy id là UserRoll
$id = $_GET['UserRoll'];
$sql = "delete from users where UserID=$id "; 
if ($conn->query($sql) === TRUE) {
  echo "xóa admin thành công";
  header('location:'.SITEURL.'admin/admin-qlph.php');
} else {
  echo "xóa admin thất bại " . $conn->error;
  
$conn->close();}

?> 
