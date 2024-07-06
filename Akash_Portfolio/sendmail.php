<?php

    use \PHPMailer\PHPMailer\PHPMailer;
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
$mail = new PHPMailer(true);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
            try{
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'akashgbhat11@gmail.com'; // Gmail address which you want to use as SMTP server
                $mail->Password = 'hezdexwretyufbjs'; // Gmail address Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = '587';
            
                $mail->setFrom("akashgbhat2002@gmail.com"); // Gmail address which you used as SMTP server
                $mail->addAddress("akashgbhat2002@gmail.com"); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
            
                $mail->isHTML(true);
                $mail->Subject = 'Message From  '.$username.'new message from profile)';
                $mail->Body = "<h3>Contact Message From $username ($email)</h3>
                <h5>This message is regarding $subject</h5><p>$message</p>";
        
                     $mail->send();
                     $alert =  "success";
                   } catch (Exception $e){
                     $alert = '<div class="alert alert-danger">
                                 <span>'.$e->getMessage().'</span>
                               </div>';
                               
                   }
           
            echo true;
        }
       
?>