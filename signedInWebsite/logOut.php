<?php
session_start();
session_destroy();
header("Location: /notSignedInWebsite/Home.php");
exit();
?>
