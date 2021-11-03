<?php
    include("../config/constants.php");
    $AdID = $_POST['AdID'];

    if(isset($_POST['send-mail'])){
        
        $email = $_POST['email'];
        $sql = "SELECT * FROM admin WHERE AdID = $AdID";
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res)>0){

            $row = mysqli_fetch_assoc($res);

            include("template/mail-send.php");
            $mail->addAddress($email); 
            
            // Mail subject 
            $mail->Subject = 'XÁC THỰC TÀI KHOẢN ADMIN'; 
            
            // Mail body content 
            $bodyContent = '<h1>Chào mừng '.$row['AdName'].'</h1>'; 
            $bodyContent = '<p>Không cung cấp mã này cho bất kì ai, hãy trở lại trang và nhập mã để hoàn tất việc các thực</p>'; 
            $bodyContent .= '<p>Mã xác thực của bạn là:<h2><b>'.$row['AdCode'].'</b></h2></p>'; 
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
        if(isset($_POST['AdEmail'])){
            $AdEmail = $_POST['AdEmail'];
            $codeAd = $_POST['code'];
            $sql1 = "SELECT * FROM admin WHERE AdID=$AdID and AdCode=$codeAd";
            $res1 = mysqli_query($conn, $sql1);
            if(mysqli_num_rows($res1)>0){
                $row1 = mysqli_fetch_assoc($res1);
                $sql2 = "UPDATE admin set AdStatus=1, AdEmail='$AdEmail' where AdID=$AdID";
                $res2 = mysqli_query($conn, $sql2);

                if($res2==TRUE){
                    $_SESSION['Ad_Status'] = 1;
                    echo "updated|".SITEURL."admin/index.php";
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