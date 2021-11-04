<?php 
  include("template/header.php"); 
  if(isset($_SESSION['MyID'])){
    $UserID = $_SESSION['MyID'];
  }else{
    header(header('location:'.SITEURL.'login.php'));
  }
?>

<script>
  var userID = <?php echo $UserID;?>;
</script>

<section class="gradient-custom vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="">

              <h2 class="fw-bold mt-2 text-uppercase mb-3">Xác thực</h2>
              <p class="text-white-50" style="margin-bottom:0;">Nhập tài khoản email của bạn tại đây</p>
              <form action="" method="GET" name="send-mail-form">
                <div class="form-outline form-white mb-1 d-flex justify-content-between">
                  <div class="w-75">
                      <input name="email" type="email" id="typeEmailX" placeholder="example@gmail.com" class="form-control text-light form-control-lg bg-dark border-2" />
                  </div>
                  <button name="send-mail" class="btn btn-outline-light btn-lg px-5 mb-5" type="submit">Enter</button>
                </div>
                <div class="send-alert"></div>
              </form>
              <form action="" method="POST" name="confirm-code-form">
                <div class="d-flex justify-content-center mb-3">
                  <div class="form-outline form-white w-50 mb-4">
                      <label class="form-label" for="typePasswordX">Mã xác thực</label>
                      <input name="code" type="text" id="typePasswordX" placeholder="Code" class="form-control text-light form-control-lg bg-dark border-2" />
                  </div>
                </div>
                <div class="confirm-alert"></div>
                <button name="confirm-code" class="btn btn-outline-light btn-lg px-5 mb-3" type="submit">Xác thực</button>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include("template/footer.php"); ?>