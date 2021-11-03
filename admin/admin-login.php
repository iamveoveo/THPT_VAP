<?php include("template/header.php"); ?>

<div class="container-fluid ps-md-0">
  <div class="row g-0">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Chào mừng bạn!</h3>

              <!-- Sign In Form -->
                <form method="POST" action="">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="adname" placeholder="abc">
                        <label for="floatingInput">Tên đăng nhập</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="pass" placeholder="Password">
                        <label for="floatingPassword">Mật khẩu</label>
                    </div>

                    <?php
                        if(isset($_SESSION['wrong_password']))
                        {
                            echo $_SESSION['wrong_password'];
                            unset($_SESSION['wrong_password']);
                        }
                    ?>

                    <div class="d-grid">
                        <button name="login" class="btn btn-lg mt-3 btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Đăng nhập</button>
                        <div class="text-center">
                            <a class="small" href="#">Quên mật khẩu?</a>
                        </div>
                    </div>

                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
  if(isset($_POST['login'])){
    $AdName = $_POST['adname'];
    $Pass = $_POST['pass'];
    
    $sql = "SELECT * FROM admin WHERE AdName = '$AdName'";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res)>0){
      $row = mysqli_fetch_assoc($res);
      $pass_saved = $row ['AdPassword'];

      if(password_verify($Pass, $pass_saved)){
        if($row['AdStatus']==0){
          $_SESSION['Ad_ID'] = $row['AdID'];
          $_SESSION['Ad_Status'] = $row['AdStatus'];
          header("location:".SITEURL."admin/email-verification.php");
        }
        else{
          $_SESSION['Ad_ID'] = $row['AdID'];
          $_SESSION['Ad_Status'] = $row['AdStatus'];
          header("location:".SITEURL."admin/index.php");
        }
      }
      else{
        $_SESSION['wrong_password'] = "<span class='text-danger'>Sai mật khẩu</span>";
        header('location:'.SITEURL.'admin/admin-login.php');
      }
    }
    else{
      $_SESSION['wrong_password'] = "<span class='text-danger'>Tên đăng nhập không tồn tại</span>";
      header('location:'.SITEURL.'admin/admin-login.php');
    }
  }
?>

<?php include("template/footer.php"); ?>