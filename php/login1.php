<?php
session_start();
require_once "connessione.php";
$accesso = new DBAccess();
$conn = $accesso->openDB();
if ($conn == false) { die("connessione al DB fallita"); }
$email = $_POST['email'];
$psw = $_POST['password'];

$sql = "select * from utente where email ='" . $email . "' and psw = '$psw' ";
$result = $accesso->query($sql);

if (isset($_GET['logout'])){
    unset($_SESSION['admin_login']);
    unset($_SESSION['logged_in']);
    unset($_SESSION['user']);
    $accesso->closeDB();
    header("Location: ../html/loginAdmin.html");
    exit;
}

if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {
//        echo "id: " . $row["id"] . " - psw: " . $row["email"] . " " . $row["psw"] . "<br>";
    }
    $_SESSION['admin_login'] = 1;
    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = $email;
    $accesso->closeDB();
    header("Location: ../php/candidati.php");
    exit;
} else {
    $accesso->closeDB();
    header("Location: ../html/loginAdmin.html");
    exit;
}
?>