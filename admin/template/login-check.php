<?php
    if(!isset($_SESSION['Ad_ID'])){
        $_SESSION['wrong_password'] = "<span class='text-danger'>Hãy đăng nhập bằng tài khoản của bạn</span>";
        header('location:'.SITEURL.'admin/admin-login.php');
    }
    else{
        if($_SESSION['Ad_Status']==0){
            header('location:'.SITEURL.'admin/email-verification.php');
        }
    }
?>