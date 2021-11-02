<?php
    if(!isset($_SESSION['MyID'])){
        $_SESSION['login-alert'] = "<span class='text-danger'>Hãy đăng nhập bằng tài khoản của bạn</span>";
        header('location:'.SITEURL.'login.php');
    }else{
        if($_SESSION['MyStatus']==0){
            header('location:'.SITEURL.'email_confirm.php');
        }
    }
?>