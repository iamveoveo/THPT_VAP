<?php
    include("config/constants.php");
    $UserID = $_POST['UserID'];

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
?>
<?php
  if(isset($_POST['confirm-code'])){
    $code = $_POST['code'];
    $sql9 = "select * from users where UserID=$UserID and UserCode=$code";
    $res9 = mysqli_query($conn, $sql9);
    if(mysqli_num_rows($res9)>0){
        $row9 = mysqli_fetch_assoc($res9);
        $sql10 = "update users set UserStatus=1 where UserID=$UserID";
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
  }
?>
