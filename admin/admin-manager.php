<?php include("template/header.php"); 
    if($_SESSION['Ad_Status']<2){
        $_SESSION['cannotAccess'] = "<div class='text-danger w-100 ps-5 mt-3'>Bạn không đủ thẩm quyền để sử dụng chức năng này.</div>";
        header('location:'.SITEURL.'admin/');
    }
?>

<script>
    var region = "manager";
</script>

<div class='dashboard'>
    <?php include("template/admin.php");?>

    <!-- bảng -->
    <div class='dashboard-app'>
        <div class='dashboard-toolbar row'>
            <div class="col-5"><a href="#!" class="menu-toggle "><i class="fas fa-bars"></i></a></div>
            <div class="row height d-flex justify-content-center align-items-center col-7">
                <form class="form" id="header-search"> 
                    <i class="fa fa-search"></i> <input name="key" type="text" class="form-control form-input" placeholder="Tìm kiếm mọi thứ..."> <span class="left-pan"><i class="fa fa-microphone search-submit"></i></span> 
                </form>
            </div>
        </div>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h2>Quản lý Admin</h2>
                    </div>
                    <?php
                        if(isset($_SESSION['delete'])){
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }
                        if(isset($_SESSION['add_admin']))
                        {
                            echo $_SESSION['add_admin'];
                            unset($_SESSION['add_admin']);
                        }      
                        if(isset($_SESSION['update']))
                        {
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                        }   
                    ?>
                    <div class='card-body'>      
                        <div>
                            <a class="btn m-3 btn-lg " data-bs-toggle="modal" data-bs-target="#add" href="#" style="    background-color: #7d9fb9;color: #fff;" role="button">Thêm mới</a>
                        </div>
                        <div class="col-md-12">
                            <div id="table" style="max-height:50vh;overflow-y:scroll;">
                                <table class="table table-hover table-secondary ">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Tên tài khoản</th>
                                            <th scope="col">Họ và tên</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Sửa</th>
                                            <th scope="col">Xóa</th>
                                            <th scope="col">Xem chi tiết</th>
                                        </tr>
                                    </thead>
                                    <tbody id="main-tbody">
                                        <?php

                                        $sql="SELECT * FROM admin ";
                                            
                                        $result = mysqli_query($conn,$sql);

                                        if(mysqli_num_rows($result)>0){
                                        $i=1;                                            
                                        while($row = mysqli_fetch_assoc($result)){
                                        ?>

                                        <tr>
                                            <th scope="row"><?php echo $i; ?></th>
                                            <td><?php echo $row['AdName']; ?></td>
                                            <td><?php echo $row['AdRName']; ?></td>
                                            <td><?php echo $row['AdEmail']; ?></td>
                                            <td><?php echo $row['AdTel']; ?></td>
                                            <td><?php echo $row['AdStatus']; ?></td>
                                            <td><button id="<?php echo $row['AdID'];?>" type="button" class="btn icon-admin icon-manager" data-bs-toggle="modal" data-bs-target="#editor" ><i class="fas fa-edit " ></i></button></td>
                                            <td><a href="<?php echo SITEURL;?>admin/admin_delete.php?Delete_admin=&AdID=<?php echo $row['AdID'];?>"><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button></a></td>
                                            <td><button id="<?php echo $row['AdID'];?>" type="button" class="btn icon-manager-detail" data-bs-toggle="modal" data-bs-target="#detail"> <i class="fas fa-info-circle" style="font-size:25px"></i></button></td>

                                        </tr>
                                        <?php
                                            $i++;
                                            }
                                        }
                                        ?>
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
                                    <form action="process-add.php" method="POST">
                                        <div class="modal-body">
                                            <div class=" col-12">
                                                <div class="card h-100" style="background:rgb(88 116 149 / 19%)">
                                                    <div class="card-body">
                                                        <div class="row gutters">
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <h6 class="mb-3 text-primary fs-5 text">Thông tin tài khoản</h6>
                                                                <input type="hidden" name="StudenId" value="">
                                                            </div>
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                                                                <div class="form-group">
                                                                    <label for="fullName">Họ và tên</label>
                                                                    <input type="text" class="form-control" name="txtHoTen" >
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                                <div class="form-group">
                                                                    <label for="fullName">Tên tài khoản</label>
                                                                    <input type="text" id="admin-txtTaiKhoan" class="form-control" name="txtTaiKhoan" >
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                                <div class="form-group">
                                                                    <label for="phone">Mật khẩu</label>
                                                                    <input type="password" class="form-control " name="adpass" >
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
                                                                    <label for="phone">Địa chỉ</label>
                                                                    <input type="text" class="form-control " name="txtDiaChi" placeholder="Xã,phường/huyện/tỉnh">
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
                                                                <select class="form-select" name="txtGioiTinh" aria-label="Default select example">
                                                                    <option value="">Chọn giới tính</option>
                                                                    <option value="Nam">Nam</option>
                                                                    <option value="Nữ">Nữ</option>
                                                                    <option value="Khác">Khác</option>
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
                                            <button type="submit" class="btn" name="add-admin" style="background-color: #3D56B2; color:#fff;" data-bs-dismiss="modal" >Lưu</button>
                                        </div>
                                    </form>
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
                                     <form action="" method="POST">
                                        <div class="modal-body editor-body">
                                            
                                        </div>

                                        <!-- btn hủy và lưu -->
                                        <div class="modal-footer">
                                            <button type="button"class="btn btn-secondary" style="background-color: #937da9" data-bs-dismiss="modal">Hủy</button>
                                            <button type="button" id="reset"  class="btn btn-secondary" style="background-color: #937da9" data-bs-toggle="modal" data-bs-target="#reset-pass" data-bs-dismiss="modal">Đặt lại mật khẩu</button>
                                            <button type="submit" class="btn" name="update-admin" style="background-color: #3D56B2; color:#fff;" data-bs-dismiss="modal" >Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- modal reset password -->
                        <div class="modal fade" id="reset-pass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                     <form action="" method="POST">
                                        <div class="modal-body">
                                            <input type="hidden" name="user-reset" >
                                            <div class="p-4">
                                                <h5 class="text-center" style="font-weight: 700;">Đặt lại mật khẩu của người dùng này thành mặc định?</h5>
                                            </div>
                                            <div class="row" style="justify-content: space-evenly;">
                                                <button type="button" class="col-5 btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <button type="submit" name="reset-pass" class="col-5 btn btn-primary">Xác nhận</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- modal detail -->
                        <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">

                                    <!--form detail -->
                                    <h5 class="modal-title">Thông tin chi tiết</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                     <form action="" method="POST">
                                        <div class="modal-body detail-body">
                                            
                                        </div>

                                        <!-- btn hủy và lưu -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" style="background-color: #937da9" data-bs-dismiss="modal">Đống</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                      
                        <!-- btn import và export -->
                        <!-- btn import và export -->
                        <div class="center row">
                
                            <div class="btn-2 col-5">
                                <form action="import-export.php" method="POST" id="form_hs" enctype="multipart/form-data" >     
                                    <input type="hidden" name="export_admin" value="">
                                    <a name="export" type="submit" role="button" data-mdb-ripple-color="dark">
                                    <span style="color:#fff;">Xuất file</span></a> 
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
<?php

if(isset ($_POST['update-admin']))
{    
    $ID= $_POST['AdID'];
    $AdRName = $_POST['txtHoTen'];
    $AdTel = $_POST['sdt'];
    $AdEmail  = $_POST['txtEmail'];
    $AdAdd  = $_POST['txtDiachi'];
    $AdBirth = $_POST['ngaySinh"'];
    $AdGender = $_POST['Gioitinh'];
    //lệnh truy vấn sql để update
    $sql = "UPDATE admin set
    AdRName = '$AdRName',
    AdTel = '$AdTel',
    AdEmail = '$AdEmail',
    AdAdd = '$AdAdd',
    AdBirth = '$AdBirth',
    AdGender = '$AdGender'
     WHERE AdID= $ID ";
    //thưc hiện truy vấn 
    $query = mysqli_query($conn, $sql); 

    if($query==TRUE)
    {
        $_SESSION['update']="<div class='text-success'>sửa thành công.</div>";
        header('location: '.SITEURL.'admin/admin-manager.php');
    }
    else
    {
        $_SESSION['update']="<div class='text-danger'>Sửa thất bại.</div>";
        header('location: '.SITEURL.'admin/admin-manager.php');
   
    }

}

if(isset($_POST['reset-pass'])){
    $AdID = $_POST['user-reset'];

    $sql_reset = "select AdName from Admin where AdID = '$AdID'";
    $res_reset = mysqli_query($conn, $sql_reset);

    if(mysqli_num_rows($res_reset)>0){
        $row_reset = mysqli_fetch_assoc($res_reset);
        $pass_reset = password_hash($row_reset['AdName'], PASSWORD_DEFAULT);

        $sql_reset1 = "update admin set AdPassword='$pass_reset' where AdID='$AdID'";
        $res_reset1 = mysqli_query($conn, $sql_reset1);

        if($res_reset1){
            $_SESSION['update']="<div class='text-success'>Đặt lại thành công.</div>";
            header('location: '.SITEURL.'admin/admin-manager.php');
        }else{
            $_SESSION['update']="<div class='text-danger'>Đạt lại thất bại.</div>";
            header('location: '.SITEURL.'admin/admin-manager.php');
        }
    }else{
        $_SESSION['update']="<div class='text-danger'>Đạt lại thất bại.</div>";
        header('location: '.SITEURL.'admin/admin-manager.php');
    }
}
?>
<?php include("template/footer.php"); ?>

<script>
    $(document).ready(function(){
        $('#reset').on('click', function(){
            $('[name="user-reset"]').val($('[name="AdID"]').val());
        })
    })
</script>
