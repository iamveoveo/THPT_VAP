<?php include("template/header.php"); ?>

<div class='dashboard'>
    <?php include("template/admin.php");?>

    <!-- bảng -->
    <div class='dashboard-app'>
        <div class='dashboard-toolbar row'>
            <div class="col-5"><a href="#!" class="menu-toggle "><i class="fas fa-bars"></i></a></div>
            <div class="row height d-flex justify-content-center align-items-center col-7">
                <div class="form"> 
                    <i class="fa fa-search"></i> <input type="text" class="form-control form-input" placeholder="Tìm kiếm mọi thứ..."> <span class="left-pan"><i class="fa fa-microphone "></i></span> 
                </div>
            </div>
        </div>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h2>Quản lý điểm</h2>
                    </div>
                    <div class='card-body'>     
                        <div class="d-flex flex-row">
                             <div class="col-md-5">
                                <a class="btn m-3 btn-lg " data-bs-toggle="modal" data-bs-target="#add" href="#" style="    background-color: #7d9fb9;color: #fff;" role="button">Thêm mới</a>
                            </div>
                            <div class="col-md-3"  style="margin:15px">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Chọn theo lớp</option>
                                    <option value="1">10A1</option>
                                    <option value="2">10A2</option>
                                    <option value="3">11A1</option>
                                </select>
                            </div>
                            <div class="col-md-3" style="margin:15px">
                                <select class="form-select " aria-label="Default select example">
                                    <option selected>Chọn theo khối</option>
                                    <option value="1">Khối 10</option>
                                    <option value="2">Khối 11</option>
                                    <option value="3">Khối 12</option>
                                </select>
                            </div>
                        </div> 
                       
                        
                        <div class="col-md-12">
                            <div id="table">
                                <table class="table table-hover table-secondary ">
                                    <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Họ và tên</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col">Giới tính</th>
                                        <th scope="col">Ngày sinh</th>
                                        <th scope="col">Lớp dạy</th>
                                        <th scope="col">Môn dạy</th>
                                        <th scope="col">Sửa</th>
                                        <th scope="col">Xóa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>A</td>
                                            <td>B</td>
                                            <td>E</td>
                                            <td>C</td>
                                            <td>D</td>
                                            <td>G</td>
                                            <td><a href="#"><button type="button" class="btn icon-admin" data-bs-toggle="modal" data-bs-target="#add" ><i class="fas fa-edit " ></i></button> </a></td>
                                            <td><a href="#"><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button> </a></td>
                                                
                                        </tr>

                                        <tr>
                                            <td>A</td>
                                            <td>B</td>
                                            <td>E</td>
                                            <td>C</td>
                                            <td>D</td>
                                            <td>G</td>
                                            <td><a href="#"><button type="button" class="btn icon-admin" ><i class="fas fa-edit " ></i></button> </a></td>
                                            <td><a href="#"><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button> </a></td>
                                                
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    
                        </div>

                        <!-- modal add -->
                        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">

                                    <!--form add -->
                                    <h5 class="modal-title">Thêm thông tin</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class=" col-12">
                                            <div class="card h-100" style="background:rgb(88 116 149 / 19%)">
                                                <div class="card-body">
                                                    <div class="row gutters">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <h6 class="mb-3 text-primary fs-5 text">Thông tin tài khoản</h6>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="fullName">Họ và tên</label>
                                                                <input type="text" class="form-control" name="txtHoTen" >
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="eMail">Môn dạy</label>
                                                                <input type="text" class="form-control" name="txtMon" placeholder="acb@gmail.com">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="phone">Số điện thoại</label>
                                                                <input type="tel" class="form-control " name="sdt" placeholder="09x xxx xxxx">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="Street">Lớp dạy</label>
                                                                <input type="text" class="form-control" name="txtLopday" placeholder="VD:10A1,11A2,..">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="phone">Email</label>
                                                                <input type="email" class="form-control " name="txtEmail" placeholder="acb@gmail.com">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="phone">Địa chỉ</label>
                                                                <input type="text" class="form-control " name="txtDiachi" placeholder="Xã,phường/huyện/tỉnh">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="website">Ngày sinh</label>
                                                                <input type="date" class="form-control" name="ngaySinh" >
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <label class="labels">Giới tính</label>
                                                            <select class="form-select" aria-label="Default select example">
                                                                <option selected>Chọn giới tính</option>
                                                                <option value="1">Nam</option>
                                                                <option value="2">Nữ</option>
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- btn hủy và lưu -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" style="background-color: #937da9" data-bs-dismiss="modal">Hủy</button>
                                        <button type="button" class="btn" name="sbm-import" style="background-color: #3D56B2; color:#fff;" data-bs-dismiss="modal" >Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- modal edit -->
                         <div class="modal fade" id="editor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">

                                    <!--form edit -->
                                    <h5 class="modal-title">Sửa thông tin</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class=" col-12">
                                            <div class="card h-100" style="background:rgb(88 116 149 / 19%)">
                                                <div class="card-body">
                                                    <div class="row gutters">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <h6 class="mb-3 text-primary fs-5 text">Thông tin tài khoản</h6>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="fullName">Họ và tên</label>
                                                                <input type="text" class="form-control" name="txtHoTen" >
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="eMail">Môn dạy</label>
                                                                <input type="text" class="form-control" name="txtMon" placeholder="acb@gmail.com">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="phone">Số điện thoại</label>
                                                                <input type="tel" class="form-control " name="sdt" placeholder="09x xxx xxxx">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="Street">Lớp dạy</label>
                                                                <input type="text" class="form-control" name="txtLopday" placeholder="VD:10A1,11A2,..">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="phone">Email</label>
                                                                <input type="email" class="form-control " name="txtEmail" placeholder="acb@gmail.com">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="phone">Địa chỉ</label>
                                                                <input type="text" class="form-control " name="txtDiachi" placeholder="Xã,phường/huyện/tỉnh">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="website">Ngày sinh</label>
                                                                <input type="date" class="form-control" name="ngaySinh" >
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <label class="labels">Giới tính</label>
                                                            <select class="form-select" aria-label="Default select example">
                                                                <option selected>Chọn giới tính</option>
                                                                <option value="1">Nam</option>
                                                                <option value="2">Nữ</option>
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- btn hủy và lưu -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" style="background-color: #937da9" data-bs-dismiss="modal">Hủy</button>
                                        <button type="button" class="btn" name="sbm-import" style="background-color: #3D56B2; color:#fff;" data-bs-dismiss="modal" >Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <!-- btn import và export -->
                        <!-- btn import và export -->
                        <div class="center row">
                            <div class="btn-1 col-5">
                                <a href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <span>Nhập file</span></a>
                                
                            </div>
                
                            <div class="btn-2 col-5">
                                <form action="#" method="POST" enctype="multipart/form-data" >             
                                    <a href="" name="sbm-export" type="submit" role="button" data-mdb-ripple-color="dark">
                                    <span>Xuất file</span></a> 
                                </form>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">

                                    <!--up file  -->
                                    <form action="" method="POST" enctype="multipart/form-data" id="form_import" name="form_import">             
                                        <input type="file" name="file_import" >   
                                        <button type="submit" class="btn btn-outline-primary mt-2 btn-rounded rounded-pill" data-mdb-ripple-color="dark" name = "preview">Xem trước tệp</button>
                                    </form>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                    </div>

                                    <!-- btn hủy và lưu -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" style="background-color:#A6ABAF" data-bs-dismiss="modal">Hủy</button>
                                        <button type="button" class="btn" name="sbm-import" style="background-color: #855DBD; color:#fff;" data-bs-dismiss="modal" >Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("template/footer.php"); ?>

<!-- đoạn xử lý menu toogle -->
<script src="JS/admin.js"></script>
