<?php 
include("template/header.php"); 
include("template/header-menu.php");  
?>

<div class="back">
    

    <!-- table -->
    <div class="container " style="margin-top:55px">
        <!-- select -->
        <form action="" class="row">
            <div class="mb-3 col-4">
                <label for="select-class" class="form-label">Chọn lớp</label>
                <select id="select-class" class="form-select">
                    <option value="">10A1</option>
                    <option value="">10A2</option>
                </select>
                
            </div>

            <div class="mb-3 col-4">
                <label for="select-class" class="form-label">Chọn môn</label>
                <select id="select-class" class="form-select">
                    <option value="">Địa lý</option>
                    <option value="">Toán</option>
                </select>
                
            </div>
            <div class="col-2 d-flex justify-content-center align-items-center">
                <button class="btn p-3"  type="submit" style="background: #6c119a;color: #fff;">Chọn</button>

            </div>
        </form>
        <table class="table align-middle table-bordered table-secondary table-hover table-responsive">
            <thead class="table-light">
                <tr>
                <th scope="col">STT</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">Điểm 1 tiết</th>
                <th scope="col">Sửa điểm</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Sit</td>
                <td>Amet</td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm px-3">
                        <i class="far fa-edit"></i>
                    </button>
                </td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Adipisicing</td>
                <td>Elit</td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm px-3">
                    <i class="far fa-edit"></i>
                    </button>
                </td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Hic</td>
                <td>Fugiat</td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm px-3" data-bs-toggle="modal" data-bs-target="#edit">
                        <i class="far fa-edit"></i>
                    </button>

                </td>
                </tr>
            </tbody>
        </table>

        <!-- import export -->
        <div class="center row">
            <div class="col-5">
                <a href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <button class="button button--mimas"><span>Nhập tệp</span></button>
               </a>
            </div>

            <div class=" col-5">
                <form action="#" method="POST" enctype="multipart/form-data" >             
                    <a href="" type="submit" data-mdb-ripple-color="dark">
                        <button class="button button--calypso"><span>Xuất tệp</span></button>
                    </a> 
                </form>
            </div>
        </div>

    </div>

    <!-- modal import -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">

                <!--up file  -->
                <form action="#" method="POST" enctype="multipart/form-data" id="form_import" name="form_import">             
                    <input type="file" name="file_import" >   
                    <button type="submit" class="btn btn-outline-primary mt-2 btn-rounded rounded-pill" data-mdb-ripple-color="dark" name = "preview">Xem trước tệp</button>
                </form>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                </div>

                <!-- btn hủy và lưu -->
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #a6b9c8; color: #fff;" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn" style="background-color: #6a3ba2; color: #fff;" data-bs-dismiss="modal" >Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal edit transcript-->
    <div class="modal fade " id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa điểm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mx-auto">
                    <div class="col-md-6 ">
                        <div class="input-group mb-4">
                            <span class="input-group-text fw-bold fw-bold" id="basic-addon1">Điểm 1 tiết</span>
                            <input type="text" class="form-control" placeholder="Điểm 1 tiết" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text fw-bold" id="basic-addon1">Điểm 1 tiết</span>
                            <input type="text" class="form-control" placeholder="Điểm 15 phút" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text fw-bold" id="basic-addon1">Điểm 1 tiết</span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text fw-bold" id="basic-addon1">Điểm 1 tiết</span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-md-6 ml-3">
                        <div class="input-group mb-4">
                            <span class="input-group-text fw-bold" id="basic-addon1">Điểm 1 tiết</span>
                            <input type="text" class="form-control" placeholder="Điểm 1 tiết" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text fw-bold" id="basic-addon1">Điểm 1 tiết</span>
                            <input type="text" class="form-control" placeholder="Điểm 15 phút" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text fw-bold" id="basic-addon1">Điểm 1 tiết</span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text fw-bold" id="basic-addon1">Điểm 1 tiết</span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn"style=" background: rgb(110, 57, 172); color:#fff;" >Lưu thay đổi</button>
            </div>
            </div>
        </div>
    </div>
</div>

<?php include("template/footer.php"); ?>
