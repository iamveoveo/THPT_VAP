<?php
    include("../config/constants.php");
    $UserID = $_POST['UserID'];
    if(isset($_POST['send-mail'])){
        
        $email = $_POST['AdEmail'];
        $sql = "select * from users where UserID = $UserID";
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res)>0){

            $row = mysqli_fetch_assoc($res);

            include("../config/mail-send.php");
            
            // Mail subject 
            $mail->Subject = 'XÁC THỰC TÀI KHOẢN ADMIN'; 
            
            // Mail body content 
            $bodyContent = '<h1>Chào mừng '.$row['AdName'].'</h1><br>'; 
            $bodyContent = '<p>Vui lòng nhập mã xác thực để hoàn tất việc kíc hoạt tài khoản</p><br>'; 
            $bodyContent .= '<p>Mã xác thực của bạn là:<h2><b>'.$row['UserCode'].'</b></h2></p>'; 
            $mail->Body    = $bodyContent; 
            
            // Send email 
            if(!$mail->send()) { 
                echo '<span class="text-danger">Không thể gửi mã xác thực tới tài khoản này</span>'; 
            }else{
                echo '<span class="text-success">Mã xác thực đã được gửi tới email của bạn</span>';
            }
        }
    }
?>

<?php
    if(isset($_POST['verify'])){
        if(isset($_POST['UserEmail'])){
            $UserEmail = $_POST['UserEmail'];
            $code = $_POST['code'];
            $sql_1 = "select * from users where UserID=$UserID and UserCode=$code";
            $res_1 = mysqli_query($conn, $sql_1);
            if(mysqli_num_rows($res_1)>0){
                $row_1 = mysqli_fetch_assoc($res_1);
                $sql_2 = "update users set UserStatus=1, UserEmail='$UserEmail' where UserID=$UserID";
                $res_2 = mysqli_query($conn, $sql_2);

                if($res_2==TRUE){
                    $_SESSION['MyStatus'] = 1;
                    echo "updated|".SITEURL."";
                }else{
                    echo "not update|<span class="."text-danger".">Lỗi trong quá trình xác thực</span>);</script>";
                }
            }else{
                echo "wrong code|<span class="."text-danger".">Mã xác thực không đúng</span>";
            }
        }else{
            echo "null email|<span class="."text-danger".">Hãy điền địa chỉ email của bạn trước</span>";
        }
    }
?>