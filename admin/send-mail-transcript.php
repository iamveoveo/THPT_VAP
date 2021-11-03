<?php 
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/Exception.php'; 
    require '../PHPMailer/PHPMailer.php'; 
    require '../PHPMailer/SMTP.php';

    include('template/header.php');

    $sql25 = "select * from users where UserRoll='Phụ huynh'";
    $res25 = mysqli_query($conn, $sql25);
    $j=0;
    
    if(mysqli_num_rows($res25)>0){
        while($row25 = mysqli_fetch_assoc($res25)){
            if($row25['UserEmail'] == "" || $row25['UserChild'] == ""){
                continue;
            }else{
                $j++;
                $email = $row25['UserEmail'];
                $sql26 = "select * from transcript, users where Student_UserID = '".$row25['UserChild']."' and users.UserID = transcript.Student_UserID";
                $res26 = mysqli_query($conn, $sql26);

                if(mysqli_num_rows($res26)>0){
                    $mail = new PHPMailer; 

                    $mail->isSMTP();                      // Set mailer to use SMTP 
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );
                    $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
                    $mail->SMTPAuth = true;               // Enable SMTP authentication 
                    $mail->Username = 'vinhveoveo21@gmail.com';   // SMTP username 
                    $mail->Password = 'hbajafrbkjeoqlgt';   // SMTP password 
                    $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
                    $mail->Port = 587;                    // TCP port to connect to 
                    $mail->CharSet = 'UTF-8';

                    // Sender info 
                    $mail->setFrom('vinhveoveo21@gmail.com', 'THPT_VAP'); 
                    $mail->addReplyTo('vinhveoveo21@gmail.com', 'THPT_VAP'); 

                    // Add a recipient 
                    $mail->addAddress($email); 

                    //$mail->addCC('cc@example.com'); 
                    //$mail->addBCC('bcc@example.com'); 

                    // Set email format to HTML 
                    $mail->isHTML(true); 
                    
                    // Mail subject 
                    $mail->Subject = 'BẢNG ĐIỂM [THPT_VAP]'; 
                    
                    // Mail body content 
                    $i = 0;
                    $bodyContent = '<h1>Kính chào '.$row25['UserRName'].'</h1>'; 
                    $bodyContent .= '<p>Nhà trường xin được gửi bảng điểm</p>'; 
                    $bodyContent .= '<table>
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Họ và tên</th>
                                                <th scope="col">Môn</th>
                                                <th scope="col">Điểm giữa kì</th>
                                                <th scope="col">Điểm cuối kì</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                    while($row26 = mysqli_fetch_assoc($res26)){
                        $i++;
                        $bodyContent .= '<tr>
                                            <th scope="row">'.$i.'</th>
                                            <td>'.$row26['UserRName'].'</td>
                                            <td>'.$row26['Subject'].'</td>
                                            <td>'.$row26['MidTerm'].'</td>
                                            <td>'.$row26['FinalExam'].'</td>
                                        </tr>';   
                    }
                    $bodyContent .= '</tbody></table>';
                    $mail->Body    = $bodyContent; 
                    
                    // Send email 
                    if(!$mail->send()) { 
                        echo '<span class="text-danger">Không thể gửi mã xác thực tới tài khoản này</span>'; 
                    }else{
                        echo '<span class="text-success">gửi đi '.$j.'</span>';
                    }
                }else{
                    continue;
                }
            }
        }
    }
?>