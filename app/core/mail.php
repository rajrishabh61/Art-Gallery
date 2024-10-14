<?php
require 'app/libs/smtp/PHPMailerAutoload.php';
$emsg = '';

    function sendMail($recipient, $subject, $message) {
        $mail = new PHPMailer();
    
        try {
            // Gmail SMTP configuration
            $mail->isSMTP();
            $mail->SMTPDebug  = 0;  // Set SMTPDebug to 0 or comment out for production use
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'eaxmple@gmail.com';
            $mail->Password = 'Password';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            // Disable SSL certificate verification temporarily (optional)
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
        
            // Sender and recipient details
            $mail->setFrom('eaxmple@gmail.com', 'ArtGallery');
            $mail->addAddress($recipient);
        
            // Email content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->AltBody = $message;
        
            // Send the email
            if ($mail->send()) {
                $emsg = 'Message has been sent successfully.';
            } else {
                $emsg = 'Message could not be sent.';
                $emsg = 'Mailer Error: ' . $mail->ErrorInfo;
            }
        } catch (Exception $e) {
            $emsg = 'Message could not be sent.';
            $emsg = 'Error: ' . $e->getMessage();
        }
        
    }

?>
