<?php
include('../config/constants.php');
?>

<?php

$AdId=$_SESSION['Ad_ID'];
if(isset($_POST['up-avatar'])){

    $target_dir = "../images/avatar/";
    $newFileName = $_POST['newFileName'];
    $target_file = $target_dir . basename($_FILES["file_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
    if(isset($_POST["up-avatar"])) {
        $check = getimagesize($_FILES["file_image"]["tmp_name"]);
        if($check !== false) {
            echo "Tệp đã có 1 ảnh - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Tệp không phải ảnh.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Xin lỗi, tệp đã tồn tại.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file_image"]["size"] > 500000) {
        echo "Xin lỗi, tệp của bạn quá lớn.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Xin lỗi, chỉ tệp có dạng JPG, JPEG, PNG & GIF mới tải lên được.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Xin lỗi, bạn không thể tải file ảnh.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file_image"]["tmp_name"], $target_dir.$newFileName)) {
            echo "Ảnh ". htmlspecialchars( basename( $_FILES["file_image"]["name"])). " Tải thành công";
        } else {
            echo "Xin lỗi, tải file ảnh thất bại.";
        }
    }

    $sql="UPDATE admin SET AdAva='$newFileName' WHERE AdID='$AdId'";
    $query=mysqli_query($conn,$sql);

}
?>

<!-- sửa profile-->
<?php

if(isset($_POST['up-profile'])){
	$hoten=$_POST['txtHoTen'];
	$tenTK=$_POST['txtTK'];
	$email=$_POST['txtEmail'];
	$gioitinh=$_POST['txtGioiTinh'];
	$diachi=$_POST['txtDiaChi'];
	$sdt=$_POST['sdt'];
	$ngaysinh=$_POST['ngaySinh'];

	//update
	$sql="UPDATE admin SET
	AdName='$hoten',
	AdRName='$tenTK',
	AdEmail='$email',
	AdGender='$gioitinh',
	AdAdd='$diachi', 
	AdTel='$sdt',
	AdBirth ='$ngaysinh'
	WHERE AdID = '$AdId'";

	$query=mysqli_query($conn,$sql);
	if($query==TRUE){
		$_SESSION['profile']="<div class='text-success'>Sửa tài khoản thành công</div>";
		header('location:'.SITEURL.'admin/admin-profile.php');
	}
	else{
		$_SESSION['profile']="<div class='text-danger'>Sửa tài khoản thất bại</div>";
		header('location:'.SITEURL.'admin/admin-profile.php');
	}
}
?>
