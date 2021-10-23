<?php include("template/header.php"); ?>

<section class="gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="">

              <h2 class="fw-bold mb-2 text-uppercase">Đăng Nhập</h2>
              <p class="text-white-50 mb-5">Đăng nhập bằng tài khoản của bạn</p>

              <div class="form-outline form-white mb-4">
                <label class="form-label" for="typeEmailX">Tên người dùng</label>
                <input type="email" id="typeEmailX" class="form-control text-light form-control-lg bg-dark border-2" />
              </div>

              <div class="form-outline form-white mb-4">
                <label class="form-label" for="typePasswordX">Mật khẩu</label>
                <input type="password" id="typePasswordX" class="form-control text-light form-control-lg bg-dark border-2" />
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Quên mật khẩu?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Đăng nhập</button>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php include("template/footer.php"); ?>