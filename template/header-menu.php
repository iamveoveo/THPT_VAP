<?php include("template/login-check.php");?>
<header>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-fixed-top" style="background-color:#ffffff00;" aria-label="Eighth navbar example">
    <div class="container">
        <a class="navbar-brand" <?php echo 'href="'.SITEURL.'"';?>><i class="fas fa-school" style="font-size:30px;color:#9C19E0;"></i></a>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" <?php echo 'href="'.SITEURL.'"';?>>Trang chủ</a>
                </li>
                <li class="nav-item">
                    <?php if($_SESSION['MyRoll']!="Học sinh"){
                        echo '<a class="nav-link" href="mess.php">Phản hồi</a>';
                    }?>
                </li>
            </ul>
            <?php
                $b = mysqli_query($conn, "select UserAva from users where UserID='".$_SESSION['MyID']."'");
                $b = mysqli_fetch_assoc($b);
            ?>
            <div class="" style="margin-right:10px">
                <form action="search.php" method="GET" class="navbar-form navbar-left" >
                    <div class="form-group">
                        <input name="takeName" type="text" class="form-control" placeholder="Tìm kiếm">
                    </div>
                </form>
                
            </div>
            

            <div class="text-light">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
                    <li class="nav-item me-2"><a href="profile.php"><img src="images/avatar/<?php echo $b['UserAva'];?>" class="small-ava" alt="avatar"></a></li>
                    <?php if($_SESSION['MyRoll']!="Học sinh"){
                        echo '<li class="nav-item me-2"><a href="mess.php"><i class="fab fa-facebook-messenger" style="font-size: 38px; color:#3E00FF;"></i></a></li>';
                    }?>
                    <li class="nav-item me-2"><a href="logout.php"><i class="fas fa-sign-out-alt" style="font-size: 38px;color:white;"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
</header>