<?php
// Start the session
session_start();
session_destroy();
unset($_SESSION["admin_login"]);

header("Location: loginAdmin.php");
exit;
?>