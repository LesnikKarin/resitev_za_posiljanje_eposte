<?php 
include '../backend/config.php';
$conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$conn) {
    trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
} else {
    mysqli_set_charset($conn, 'utf8');
}
if (session_status() === PHP_SESSION_NONE) { 
    session_start(); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT idUser FROM user WHERE email = '$email' AND password = SHA('$password')";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['user'] = $email;
        header("Location: ../frontend/index.php");
        error_reporting(E_ALL ^ E_NOTICE);
        die();
    } else {
        $napaka = "Try again!";
    }
}
?>