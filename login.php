<?php include("template/header.php"); ?>

<section class="gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="">
              <h2 class="fw-bold mb-2 text-uppercase" style="cursor: default;">Đăng Nhập</h2>
              <p class="text-white-50 mb-5" style="cursor: default;">Đăng nhập bằng tài khoản của bạn</p>
              
              <?php
                if(isset($_SESSION['login-alert'])){
                  echo $_SESSION['login-alert'];
                  unset($_SESSION['login-alert']);
                }
              ?>

              <form action="" method="POST">
                <div class="form-outline form-white mb-4">
                  <label class="form-label" for="typeEmailX">Tên người dùng</label>
                  <input type="text" name="username" id="typeEmailX" class="form-control text-light form-control-lg bg-dark border-2" placeholder="Nhập tài khoản"/>
                </div>
                <div class="form-outline form-white mb-4">
                  <label class="form-label" for="typePasswordX">Mật khẩu</label>
                  <input type="password" name="password" id="typePasswordX" class="form-control text-light form-control-lg bg-dark border-2" placeholder="Nhập mật khẩu"/>
                </div>
                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Quên mật khẩu?</a></p>
                <button class="btn btn-outline-light btn-lg px-5" type="submit" name="login">Đăng nhập</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  if(isset($_POST['login'])){
    $UserName = $_POST['username'];
    $Passwword = $_POST['password'];
    
    $sql7 = "select * from users where UserName = '$UserName'";
    $res7 = mysqli_query($conn, $sql7);
    if(mysqli_num_rows($res7)>0){
      $row7 = mysqli_fetch_assoc($res7);
      if(password_verify($Passwword, $row7['UserPassword'])){
        if($row7['UserStatus']==0){
          $_SESSION['MyID'] = $row7['UserID'];
          $_SESSION['MyRoll'] = $row7['UserRoll'];
          $_SESSION['MyStatus'] = $row7['UserStatus'];
          header("location:".SITEURL."email_confirm.php");
        }else{
          $_SESSION['MyID'] = $row7['UserID'];
          $_SESSION['MyRoll'] = $row7['UserRoll'];
          $_SESSION['MyStatus'] = $row7['UserStatus'];
          header("location:".SITEURL);
        }
      }else{
        $_SESSION['login-alert'] = "<span class='text-danger'>Sai mật khẩu</span>";
        header('location:'.SITEURL.'login.php');
      }
    }else{
      $_SESSION['login-alert'] = "<span class='text-danger'>Tên đăng nhập không tồn tại</span>";
      header('location:'.SITEURL.'login.php');
    }
  }
?>

<?php include("template/footer.php"); ?>