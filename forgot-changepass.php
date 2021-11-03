<?php include("template/header.php"); 
  if(isset($_SESSION['MyID'])){
    header('location:'.SITEURL);
  }
  if(!isset($_SESSION['wander'])){
    header('location:'.SITEURL."login.php");
  }else{
    $UserID = $_SESSION['wander'];
  }
?>

<section class="gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="">
              <h2 class="fw-bold mb-2 text-uppercase" style="cursor: default;">Thay đổi mật khẩu</h2>
              <p class="text-white-50 mb-5" style="cursor: default;">Thay đổi mật khẩu của bạn</p>

              <?php
                if(isset($_SESSION['change'])){
                  echo $_SESSION['change'];
                  unset($_SESSION['change']);
                }
              ?>

              <form action="" method="POST">
                <div class="form-outline form-white mb-4">
                  <label class="form-label" for="typeEmailX">Mật khẩu mới</label>
                  <input type="password" name="newpass1" id="typeEmailX" class="form-control text-light form-control-lg bg-dark border-2" placeholder="Nhập tài khoản"/>
                </div>
                <div class="form-outline form-white mb-4">
                  <label class="form-label" for="typePasswordX">Nhập lại mật khẩu</label>
                  <input type="password" name="newpass2" id="typePasswordX" class="form-control text-light form-control-lg bg-dark border-2" placeholder="Nhập mật khẩu"/>
                </div>
                <button class="btn btn-outline-light btn-lg px-5 mt-5" type="submit" name="change-pass">Tiếp tục</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  if(isset($_POST['change-pass'])){
    $newPass2 = $_POST['newpass2'];
    $newPass1 = $_POST['newpass1'];
    
    if($newPass1 == $newPass2){
      $newPass = password_hash($newPass2, PASSWORD_DEFAULT);
      $sql23 = "update users set UserPassword = '$newPass' where UserID = '$UserID'";
      $res23 = mysqli_query($conn, $sql23);

      if($res23){
        $_SESSION['login-alert'] = "<span class='text-success'>Đã thay đổi mật khẩu thành công. Hãy đăng nhập lại bằng tài khoản của bạn</span>";
        unset($_SESSION['wander']);
        header('location:'.SITEURL.'login.php');
      }else{
        $_SESSION['change'] = "<span class='text-danger'>Đã có sự cố xảy ra</span>";
        header('location:'.SITEURL.'forgot-changepass.php');
      }
    }else{
      $_SESSION['change'] = "<span class='text-danger'>Mật khẩu nhập lại chưa trùng khớp</span>";
      header('location:'.SITEURL.'forgot-changepass.php');
    }
  }
?>

<?php include("template/footer.php"); ?>