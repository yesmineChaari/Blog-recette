<?php
if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["subject"]) || empty($_POST["message"])){
    header("Location: errorPage.php");
    exit();
}


    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    require "vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;



    $mail = new PHPMailer(true);


    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "yasminechaari2004@gmail.com";
    $mail->Password = "yzwi uiwo ohxy egxm";

    $mail->setFrom($email, $name);
    $mail->addAddress("chaari.yasmine.plus@gmail.com", "yummy recipe");

    $mail->Subject = $subject;
    $mail->Body = $message . "\n\nReply to: " . $email;

    $mail->send();

    header("Location: emailSent.php");
exit();
?>
