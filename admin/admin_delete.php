<?php
    include("template/header.php"); 

    if(isset($_GET['Delete_admin'])){
    $id = $_GET['AdID'];
    
    $sql = "DELETE from admin where AdID='$id'";
    $result = mysqli_query($conn, $sql);    
    if ($conn->query($sql) === TRUE) {
        $_SESSION['delete'] = "<span class='text-success'>Xóa thành công</span>";
        header('location:'.SITEURL.'admin/admin-manager.php');
    } else {
        $_SESSION['delete'] = "<span class='text-danger'>Xóa thất bại</span>";
        header('location:'.SITEURL.'admin/admin-manager.php');
    }
    $conn->close();
    }  

    if(isset($_GET['Delete_diem'])){
        $id1 = $_GET['Student_UserID'];
        $sj =$_GET['Subject'];
        
        $sql1 = "DELETE FROM transcript WHERE Student_UserID='$id1' and Subject ='$sj'";
        $result1 = mysqli_query($conn, $sql1);    
        if ($conn->query($sql1) === TRUE) {
            $_SESSION['delete'] = "<span class='text-success'>Xóa thành công</span>";
            header('location:'.SITEURL.'admin/admin-qld.php');
        } else {
            $_SESSION['delete'] = "<span class='text-danger'>Xóa thất bại</span>";
            header('location:'.SITEURL.'admin/admin-qld.php');
        }
        $conn->close();
    }

    if(isset($_GET['Delete_gv'])){
    // trang quanlixoagv
        //lấy id là UserID
        $id = $_GET['UserID'];
        
        $sql1 = "delete from mess where ToUserID = '$id' or FromUserID = '$id'";
        $res1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
    
        if($res1){
        $sql2 = "delete from teach where Teacher_UserID = '$id' ";
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
    }

    if(isset($_GET['Delete_hs'])){
    // trang quanlixoahocsinh
        //lấy id là UserID
        $id = $_GET['UserID'];
        
        $sql1 = "delete from transcript where Student_UserID = '$id'";
        $res1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
    
        if($res1){
        $sql2 = "delete from users where UserChild='$id'";
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
    }

    if(isset($_GET['Delete_ph'])){

        $id = $_GET['UserID'];
        $sql1 = "delete from mess where ToUserID = '$id' or FromUserID = '$id'";
        $res1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
        
        if($res1){
            $sql = "DELETE FROM users WHERE UserID=$id";
            $result = mysqli_query($conn, $sql);
        
            if ($conn->query($sql) === TRUE) {
            $_SESSION['delete'] = "<span class='text-success'>Xóa thành công</span>";
            header('location:'.SITEURL.'admin/admin-qlph.php');
            } else {
            $_SESSION['delete'] = "<span class='text-danger'>Xóa thất bại</span>";
            header('location:'.SITEURL.'admin/admin-qlph.php');
            }
            $conn->close();
        }else {
            $_SESSION['delete'] = "<span class='text-danger'>Xóa thất bại</span>";
            header('location:'.SITEURL.'admin/admin-qlph.php');
        }
    }

    if(isset($_GET['Delete_mon'])){

        $id = $_GET['TeachID'];
        $sql1 = "delete from teach where TeachID = '$id'";
        $res1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
        
        if($res1){
            $_SESSION['delete'] = "<span class='text-success'>Xóa thành công</span>";
            header('location:'.SITEURL.'admin/admin-qll.php');
        }else {
            $_SESSION['delete'] = "<span class='text-danger'>Xóa thất bại</span>";
            header('location:'.SITEURL.'admin/admin-qll.php');
        }
    }
?>