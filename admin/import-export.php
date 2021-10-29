<!-- học sinh -->
<?php
    include('../config/constants.php');
?>
<?php
    if(isset($_POST["import_hs"])){
        
        $filename=$_FILES["file_import_1"]["tmp_name"];    
        if($_FILES["file_import_1"]["size"] > 0)
        {      
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            {

                $sql = "SELECT * from class where ClassName='$getData[8]' ";
                $res1 = mysqli_query($conn, $sql);
                $row = [];
                if(mysqli_num_rows($res1)>0){
                    $row1 = mysqli_fetch_assoc($res1);
                }
                $sql2 = "SELECT * from users where UserName='$getData[1]'";//ktra email đã tồn tại trên DB hay chưa
                $res2 = mysqli_query($conn, $sql2);
                if(mysqli_num_rows($res2)==0){
                    
                    $sql_1="INSERT INTO users SET
                    UserName = '".$getData[1]."',
                    UserRName ='".$getData[2]."',
                    UserEmail = '".$getData[3]."',
                    UserTel = '".$getData[4]."',
                    UserAdd = '".$getData[5]."',
                    UserGender = '".$getData[6]."',
                    UserBirth ='".$getData[7]."',
                    UserClass = '".$row1['UserClass']."',
                    UserRoll ='".$getData[9]."',
                    ";

                    $res3 = mysqli_query($conn, $sql_1);
                    if(!isset($res3))
                    {
                        echo "<script type=\"text/javascript\">
                            alert(\"Invalid File:Please Upload CSV File.\");
                            window.location = \"index.php\"
                            </script>";   
                    }
                    else {
                    
                    }
                }
            }
            ?>
                <table class="table table-hover table-secondary ">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Tên tài khoản</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Lớp </th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                            <th scope="col">Xem chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql1="SELECT UserID, UserName, UserRName, UserEmail, UserTel, UserAdd, UserGender, UserBirth, UserRoll, UserClass, ClassName, ClassID
                            FROM users ,class WHERE  UserRoll='Học sinh' AND UserClass=ClassID";
                            
                        $res4 = mysqli_query($conn,$sql1);

                        if(mysqli_num_rows($res4)>0){
                        $i=1;                                            
                        while($row = mysqli_fetch_assoc($res4)){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row['UserRName']; ?></td>
                            <td><?php echo $row['UserName']; ?></td>
                            <td><?php echo $row['UserEmail']; ?></td>
                            <td><?php echo $row['UserTel']; ?></td>
                            <td><?php echo $row['ClassName']; ?></td>
                            <td><button type="button" class="btn icon-admin" data-bs-toggle="modal" data-bs-target="#add" ><i class="fas fa-edit " ></i></button></td>
                            <td><button type="button" class="btn btn-danger" ><i class="fas fa-trash-alt "></i></button></td>
                            <td><button type="button" class=" btn" data-bs-toggle="modal" data-bs-target="#detail"> <i class="fas fa-info-circle" style="font-size:25px"></i></button></td>

                        </tr>
                        <?php
                            $i++;
                            }
                        }
                        ?>

                                    </tbody>
                                </table>
            <?php
        
            fclose($file);  
        }
    }   
?>
<?php
if(isset($_POST["export_hs"])){
    header('Content-Encoding: UTF-8');
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=export.csv');  
    $output = fopen("php://output", "w");  
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
    fputcsv($output, array("STT", "HoTen", "tenTK", "Email", "soDiDong", "Lop")); 

    $sql="SELECT UserID, UserName, UserRName, UserEmail, UserTel, UserAdd, UserGender, UserBirth, UserRoll, UserClass, ClassName, ClassID
    FROM users ,class WHERE  UserRoll='Học sinh' AND UserClass=ClassID";
    $result2 = mysqli_query($conn,$sql);

    $i = 0;
    if (mysqli_num_rows($result2) > 0)
    {
        while($row = mysqli_fetch_assoc($result2)){ 
            $i++;
            $new_row = array($i, $row['UserName'], $row['UserRName'], $row['Email'], $row['UserTel'], $row['ClassName']);
            fputcsv($output, $new_row); 
        }
    }  
    fclose($output);  
}  
?>
