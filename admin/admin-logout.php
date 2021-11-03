<?php
    include('template/header.php');
    session_destroy();
    header('location:'.SITEURL.'admin/admin-login.php');
?>