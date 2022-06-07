<?php

namespace Sixsad\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class CreateMail
{
    public static function generate(string $email, string $code, string $status = "email", string $body ="<h1>Здравствуйте!</h1>
        <p>Вы получили это письмо, потому что на нашем сервисе для регистрации был указан адрес вашей электронной почты.</p>
        <p>Для подтверждения вашего аккаунта введите код:<p>
        <div style='background:#faf9fa;border:1px solid #dad8de;text-align:center;padding:5px;margin:0 0 5px 0;font-size:24px;line-height:1.5;width:80%'>$code</div>
        С уважением, команда сервиса M.Connection.", string $altBody = "Здравствуйте!
        Вы получили это письмо, потому что на нашем сервисе для регистрации был указан адрес вашей электронной почты.
        Для подтверждения вашего аккаунта введите код:
        $code
        С уважением, команда сервиса M.Connection."): PHPMailer
    {
        $config = config("email");

        $mail = new PHPMailer(true);

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $config['email'];
        $mail->Password   = $config['password'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom($config['email'], $config['name']);
        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = $status == "email"
            ? "Подтверждение почты"
            : "Восстановление пароля";

        $mail->Body = $body;

        $mail->AltBody = $altBody;

        $mail->CharSet = "UTF-8";

        return $mail;
    }
}
