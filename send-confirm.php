<?php
    include("config/constants.php");
    if(isset($_SESSION['MyID'])){
        $UserID = $_POST['UserID'];
    }

    if(isset($_POST['send-mail'])){
        
        $email = $_POST['email'];
        $sql8 = "select * from users where UserID = $UserID";
        $res8 = mysqli_query($conn, $sql8);
        if(mysqli_num_rows($res8)>0){

            $row8 = mysqli_fetch_assoc($res8);

            include("config/mail-send.php");
            
            // Mail subject 
            $mail->Subject = 'XÁC THỰC TÀI KHOẢN'; 
            
            // Mail body content 
            $bodyContent = '<h1>Chào mừng '.$row8['UserRName'].'</h1>'; 
            $bodyContent .= '<p>Mã xác thực của bạn là:<h2><b>'.$row8['UserCode'].'</b></h2></p>'; 
            $mail->Body    = $bodyContent; 
            
            // Send email 
            if(!$mail->send()) { 
                echo '<span class="text-danger">Không thể gửi mã xác thực tới tài khoản này</span>'; 
            }else{
                echo '<span class="text-success">Mã xác thực đã được gửi tới email của bạn</span>';
            }
        }
    }

    if(isset($_POST['send-mail-forgot'])){
        
        $UserName = $_POST['username'];

        $sql8 = "select * from users where UserName = '$UserName'";
        $res8 = mysqli_query($conn, $sql8);
        if(mysqli_num_rows($res8)>0){

            $row8 = mysqli_fetch_assoc($res8);
            $email = $row8['UserEmail'];
            $code = rand(10000000, 99999999);
            $sql22 = "update users set UserCode = '$code' where UserID = '".$row8['UserID']."'";
            $res22 = mysqli_query($conn, $sql22);

            if(!$res22){
                echo '<span class="text-danger">Đã xảy ra sự cố, xin thử lại sau giây lát</span>';
            }else{

                include("config/mail-send.php");
                
                // Mail subject 
                $mail->Subject = 'QUÊN MẬT KHẨU'; 
                
                // Mail body content 
                $bodyContent = '<h1>Chào mừng '.$row8['UserRName'].'</h1>'; 
                $bodyContent .= '<p>Mã của bạn là:<h2><b>'.$code.'</b></h2></p>'; 
                $mail->Body    = $bodyContent; 
                
                // Send email 
                if(!$mail->send()) { 
                    echo '<span class="text-danger">Không thể gửi mã xác thực tới tài khoản này</span>'; 
                }else{
                    echo '<span class="text-success">Mã xác thực đã được gửi tới tài khoản '.$email.'</span>';
                }
            }
        }else{
            echo '<span class="text-danger">Không có tài khoản nào có tên như vậy</span>'; 
        }
    }
?>
<?php
    if(isset($_POST['confirm-code'])){
        if(isset($_POST['UserEmail'])){
            $UserEmail = $_POST['UserEmail'];
            $code = $_POST['code'];
            $sql9 = "select * from users where UserID=$UserID and UserCode=$code";
            $res9 = mysqli_query($conn, $sql9);
            if(mysqli_num_rows($res9)>0){
                $row9 = mysqli_fetch_assoc($res9);
                $sql10 = "update users set UserStatus=1, UserEmail='$UserEmail' where UserID=$UserID";
                $res10 = mysqli_query($conn, $sql10);

                if($res10==TRUE){
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

    if(isset($_POST['confirm-forgot-code'])){
        if(isset($_POST['UserName'])){
            $UserName = $_POST['UserName'];
            $code = $_POST['code'];
            $sql9 = "select * from users where UserName = '$UserName' and UserCode = '$code'";
            $res9 = mysqli_query($conn, $sql9);
            if(mysqli_num_rows($res9)>0){
                $row9 = mysqli_fetch_assoc($res9);
                $_SESSION['wander'] = $row9['UserID'];
                echo "updated|".SITEURL."";
            }else{
                echo "wrong code|<span class="."text-danger".">Mã xác thực không đúng</span>";
            }
        }else{
            echo "null email|<span class="."text-danger".">Hãy điền tên tài khoản của bạn trước</span>";
        }
    }
?>
