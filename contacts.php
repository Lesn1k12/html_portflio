<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "m.tkhorevskyi@gmail.com"; 

    $mail = new PHPMailer(true);

    try {
        // Налаштування сервера відправлення пошти
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'maksboss7373@gmail.com';
        $mail->Password   = 'hazr hfwg csvn bdqx';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Налаштування відправника та отримувача
        $mail->setFrom($email, $name);
        $mail->addAddress($to);

        // Налаштування листа
        $mail->Subject = $subject;
        $mail->Body    = "Ім'я: " . $name . "\n\n" . "Повідомлення:\n" . $message;

        // Відправлення листа
        $mail->send();

        header("Location: index.html");

    } catch (Exception $e) {
        echo "Помилка при відправці повідомлення: {$mail->ErrorInfo}";
    }
} else {
    echo "Неправильний метод запиту.";
}
?>
