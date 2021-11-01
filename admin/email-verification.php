<?php 
  include("template/header.php"); 
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div onsubmit="event.preventDefault()" class="box ">
                    <h1>Xác thực</h1>
                    <p class="text-muted"> Xác nhận tài khoản của bạn ở đây. Với email đã đăng ký</p> 
                    
                    <form action="email-verification.php" method="GET" name="form-send">
                        <div class="d-flex">
                            <input class="col-8 email" type="email" name="AdEmail" placeholder="Email"> 
                            <input class="col-4" type="submit" name="send-mail" value="Gửi mã" href="#">
                        </div> 
                    </form>  
                                      
                    <form action="" method="POST" name="form-verify">
                        <input class="col-12 code" type="text" name="" placeholder="Mã xác thực"> 
                        <input type="submit" name="verify" value="Xác thực" href="#">
                    </form> 
                </div>
                        
            </div>
        </div>
    </div>
</div>

<style>
    body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: linear-gradient(to right, #b92b27, #1565c0)
    }

    .card {
        margin-bottom: 20px;
        border: none
    }

    .box {
        width: 500px;
        padding: 40px;
        position: absolute;
        top: 50%;
        left: 50%;
        background: #191919;
        ;
        text-align: center;
        transition: 0.25s;
        margin-top: 75px;
    
    }

    .box .email{
        border: 0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #3498db;
        padding: 10px 10px;
        width: 250px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s
    }
    .box .code {
        border: 0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #3498db;
        padding: 10px 20px;
        width: 360px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s
    }

    .box h1 {
        color: white;
        text-transform: uppercase;
        font-weight: 500
    }

    .box .email:focus,
    .box .code:focus {
        width: 300px;
        border-color: #2ecc71
    }

    .box input[type="submit"] {
        border: 0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #872da5;
        padding: 14px 40px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
        cursor: pointer
    }

    .box input[type="submit"]:hover {
        background: #872da5;
    }

    .forgot {
        text-decoration: underline
    }

    ul.social-network {
        list-style: none;
        display: inline;
        margin-left: 0 !important;
        padding: 0
    }

    ul.social-network li {
        display: inline;
        margin: 0 5px
    }

    .social-network a.icoFacebook:hover {
        background-color: #3B5998
    }

    .social-network a.icoTwitter:hover {
        background-color: #33ccff
    }

    .social-network a.icoGoogle:hover {
        background-color: #BD3518
    }

    .social-network a.icoFacebook:hover i,
    .social-network a.icoTwitter:hover i,
    .social-network a.icoGoogle:hover i {
        color: #fff
    }

    a.socialIcon:hover,
    .socialHoverClass {
        color: #44BCDD
    }

    .social-circle li a {
        display: inline-block;
        position: relative;
        margin: 0 auto 0 auto;
        border-radius: 50%;
        text-align: center;
        width: 50px;
        height: 50px;
        font-size: 20px
    }

    .social-circle li i {
        margin: 0;
        line-height: 50px;
        text-align: center
    }

    .social-circle li a:hover i,
    .triggeredHover {
        transform: rotate(360deg);
        transition: all 0.2s
    }

    .social-circle i {
        color: #fff;
        transition: all 0.8s;
        transition: all 0.8s
    }
</style>

<?php include("template/footer.php"); ?>