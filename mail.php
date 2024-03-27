<?php
if(isset($_POST['email']) && isset($_POST['name'] )&& isset($_POST['subject']) && isset($_POST['message'])){
    $mail_from=$_POST['email'];
    $to_email = "chaari.yasmine.plus@gmail.com";
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $name = $_POST['name'];
    ini_set("SMTP", "mail.example.com");
ini_set("smtp_port", "587");
    $headers = "content-type: text/plain; charset=UTF-8" . "\r\n" . "From: ".$mail_from . "\r\n" . "Reply-To: ".$mail_from . "\r\n" . "reply-to" . $mail_from . "\r\n" . "X-Mailer: PHP/" . phpversion();
    if( mail($to_email, $subject, $message, $headers)){
        include("emailSent.php");

    }
    else {include("errorPage.php");}
}
else{include("errorPage.php");}
?>
