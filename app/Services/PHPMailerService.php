<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailerService
{
    public function sendMail($to, $subject, $body)
    {
        $mail = new PHPMailer(true);

        try {
            dd(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));

            // Server settings
            $mail->isSMTP();
            $mail->Host       = env('MAIL_HOST');
            $mail->SMTPAuth   = true;
            $mail->Username   = env('MAIL_USERNAME');
            $mail->Password   = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Port       = env('MAIL_PORT');

            // Check From Address and Name
            $fromAddress = env('MAIL_FROM_ADDRESS');
            $fromName = env('MAIL_FROM_NAME');

            if (empty($fromAddress)) {
                throw new Exception('MAIL_FROM_ADDRESS is not set or empty in .env.');
            }

            $mail->setFrom($fromAddress, $fromName);
            $mail->addAddress($to);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;

            $mail->send();

            return "Email sent successfully";
        } catch (Exception $e) {
            return "Mailer Error: " . $mail->ErrorInfo . " - " . $e->getMessage();
        }
    }

}
