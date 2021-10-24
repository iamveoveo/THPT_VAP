<?php include("template/header.php"); ?>

<div class='dashboard'>
    <?php include("template/admin.php");?>

    <!-- bảng -->
    <div class='dashboard-app'>
        <div class='dashboard-toolbar row'>
            <div class="col-5"><a href="#!" class="menu-toggle "><i class="fas fa-bars"></i></a></div>
            <div class="row height d-flex justify-content-center align-items-center col-7">
                <div class="form"> 
                    <i class="fa fa-search"></i> <input type="text" class="form-control form-input" placeholder="Tìm kiếm mọi thứ..."> <span class="left-pan"><i class="fa fa-microphone"></i></span> 
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
                        <div>
                            <a class="btn btn-primary m-3 btn-lg" href="#" style="background-color:#9a94ee; color: #373274" role="button">Thêm mới</a>
                        </div>
                        <div class="col-md-12">
                            <div id="table">
                                <table class="table table-hover table-secondary ">
                                    <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Họ và tên</th>
                                        <th scope="col">Chức vụ</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Tên đơn vị</th>
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
                                            <td><a href="#"><i class="fas fa-edit icon-admin"></i> </a></td>
                                            <td><a href="#"><i class="fas fa-trash-alt icon-admin"></i></i></a></td>
                                                
                                        </tr>

                                        <tr>
                                            <td>A</td>
                                            <td>B</td>
                                            <td>E</td>
                                            <td>C</td>
                                            <td>D</td>
                                            <td>G</td>
                                            <td>
                                                 <a href="#"><i class="fas fa-edit icon-admin"></i> </a></td>
                                            <td><a href="#"><i class="fas fa-trash-alt icon-admin"></i></i></a></td>
                                                
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    
                        </div>
                      
                        <!-- btn import và export -->
                        <div class="center row">
                            <div class="btn-1 col-5">
                                <a href=""><span>Nhập file</span></a>
                            </div>
                
                            <div class="btn-2 col-5">
                                <a href=""><span>Xuất file</span></a>
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
