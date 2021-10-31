<?php
include('../config/constants.php');
?>
<?php
if(isset($_POST["preview"])){
    $filename=$_FILES["file_import"]["tmp_name"];    
    if($_FILES["file_import"]["size"] > 0)
    {      
        $file = fopen($filename, "r");
        ?>
        
        <table class="table table-secondary table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Tên tài khoản</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Lớp </th>
                </tr>
            </thead>
            <tbody>
                <?php
                while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
                {
                    $STT = $getData[0];
                    $hoTen = $getData[1];
                    $TenTK = $getData[2];
                    $email = $getData[3];
                    $sdt = $getData[4];
                    $gioitinh = $getData[5];
                    $Ngaysinh = $getData[6];
                    $diaChi = $getData[7];
                    $lop = $getData[8];
                    ?>
                     <tr>
                        <th scope="row"><?php echo $STT; ?></th>
                        <td><?php echo $hoTen; ?></td>
                        <td><?php echo $TenTK; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $sdt; ?></td>
                        <td><?php echo $gioitinh; ?></td> 
                        <td><?php echo $Ngaysinh; ?></td> 
                        <td><?php echo $diaChi; ?></td> 
                        <td><?php echo $lop; ?></td> 
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        
        <?php
    }
}
?>

<!-- giáo viên -->
<?php
if(isset($_POST["preview_gv"])){
    $filename=$_FILES["file_import_gv"]["tmp_name"];    
    if($_FILES["file_import_gv"]["size"] > 0)
    {      
        $file = fopen($filename, "r");
        ?>   
        <table class="table table-secondary table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Tên tài khoản</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Địa chỉ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
                {
                    $STT = $getData[0];
                    $hoTen = $getData[1];
                    $TenTK = $getData[2];
                    $email = $getData[3];
                    $sdt = $getData[4];
                    $gioitinh = $getData[5];
                    $Ngaysinh = $getData[6];
                    $diaChi = $getData[7];
                    ?>
                     <tr>
                        <th scope="row"><?php echo $STT; ?></th>
                        <td><?php echo $hoTen; ?></td>
                        <td><?php echo $TenTK; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $sdt; ?></td>
                        <td><?php echo $gioitinh; ?></td> 
                        <td><?php echo $Ngaysinh; ?></td> 
                        <td><?php echo $diaChi; ?></td> 
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        
        <?php
    }
}
?>

<!-- phụ huynh -->
<?php
if(isset($_POST["preview_ph"])){
    $filename=$_FILES["file_import_ph"]["tmp_name"];    
    if($_FILES["file_import_ph"]["size"] > 0)
    {      
        $file = fopen($filename, "r");
        ?>   
        <table class="table table-secondary table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Tên tài khoản</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Địa chỉ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
                {
                    $STT = $getData[0];
                    $hoTen = $getData[1];
                    $TenTK = $getData[2];
                    $email = $getData[3];
                    $sdt = $getData[4];
                    $gioitinh = $getData[5];
                    $Ngaysinh = $getData[6];
                    $diaChi = $getData[7];
                    ?>
                     <tr>
                        <th scope="row"><?php echo $STT; ?></th>
                        <td><?php echo $hoTen; ?></td>
                        <td><?php echo $TenTK; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $sdt; ?></td>
                        <td><?php echo $gioitinh; ?></td> 
                        <td><?php echo $Ngaysinh; ?></td> 
                        <td><?php echo $diaChi; ?></td> 
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        
        <?php
    }
}
?>

<!-- điểm -->
<?php
if(isset($_POST["preview_diem"])){
    $filename=$_FILES["file_import_diem"]["tmp_name"];    
    if($_FILES["file_import_diem"]["size"] > 0)
    {      
        $file = fopen($filename, "r");
        ?>   
         <table class="table table-hover table-secondary ">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col"> Môn học</th>
                    <th scope="col">Điểm giữa kì</th>
                    <th scope="col">Điểm cuối kì</th>
                   
                </tr>
            </thead>
            <tbody>
            <?php
                while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
                {
                    $STT = $getData[0];
                    $hoTen = $getData[1];
                    $mon = $getData[2];
                    $diemGiuaKi = $getData[3];
                    $DiemCuoiKi = $getData[4];
                   
                    ?>
                     <tr>
                        <th scope="row"><?php echo $STT; ?></th>
                        <td><?php echo $hoTen; ?></td>
                        <td><?php echo $mon; ?></td>
                        <td><?php echo $diemGiuaKi; ?></td>
                        <td><?php echo $DiemCuoiKi; ?></td>
                        
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        
        <?php
    }
}
?>

