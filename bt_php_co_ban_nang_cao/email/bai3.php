<?php
          require "PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
          require "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
          require 'PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
          $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
            try {
               // $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
                $mail->isSMTP();  
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';  //SMTP servers
                $mail->SMTPAuth = true; // Enable authentication
                $nguoigui = 'example@gmail.com'; // Nhập gmail của người gửi
                $matkhau = 'etsq gvzp beyk dgla'; // Nhập mật khẩu ứng dụng gmail người gửi
		        $tennguoigui = 'Hứa Thái'; // Nhập tên của người gửi
                $mail->Username = $nguoigui; // SMTP username
                $mail->Password = $matkhau;   // SMTP password
                $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                $mail->Port = 465;  // port to connect to                
                $mail->setFrom($nguoigui, $tennguoigui ); 
                $recipients = "example1@vku.udn.vn,example2@gmail.com,example3@gmail.com,example4@gmail.com,example5@gmail.com,example6@gmail.com";
                $email_array = explode(",",$recipients);
                foreach($email_array as $email) {
                    $to = $email;
                    $mail->addAddress($to); //mail
                }
                $mail->isHTML(true);  // Set email format to HTML
                $mail->Subject = '[THƯ CHÀO MỪNG]';      
                $noidungthu = "<b>Xin chào bạn!</b><br>
                               Tôi là Thái.
                               Rất vui được gặp bạn!" ;
                $mail->Body = $noidungthu;
               // $mail->AddAttachment("4.jpg","picture");
                $mail->smtpConnect( array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                ));
                $mail->send();
                echo 'Đã gửi mail xong';
                
            } catch (Exception $e) {
                echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
            }

?>