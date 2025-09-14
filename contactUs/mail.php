<?php
if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["subject"]) || empty($_POST["message"])){
    header("Location: /contactUs/errorPage.php");
    exit();
}
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    require "../vendor/autoload.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "*****";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = ***;
    $mail->Username = "****";
    $mail->Password = "*****";

    $mail->setFrom($email, $name);
    $mail->addAddress("*****", "yummy recipe");

    $mail->Subject = $subject;
    $mail->Body = $message . "\n\nReply to: " . $email;

    $mail->send();

    header("Location: /contactUs/emailSent.php");
exit();
?>
