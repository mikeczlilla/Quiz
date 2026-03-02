<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esport";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die('Database connection failed.');
}
mysqli_set_charset($conn, 'utf8mb4');

$otlet = $_POST['otlet'];
$nev = $_SESSION['fnev'];

$stmt = mysqli_prepare($conn, "SELECT id FROM felhasznalok WHERE fnev = ?");
mysqli_stmt_bind_param($stmt, "s", $nev);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $user_id);

if (!mysqli_stmt_fetch($stmt)) {
    mysqli_stmt_close($stmt);
    die('User not found.');
}
mysqli_stmt_close($stmt);

$insertStmt = mysqli_prepare($conn,"INSERT INTO otletek (otlet, user_id) VALUES (?, ?)");
mysqli_stmt_bind_param($insertStmt, "si", $otlet, $user_id);

if (mysqli_stmt_execute($insertStmt)) {
    echo "New record created successfully.";
    header('Location: ../fooldal.php');
} else {
    
    error_log('Insert error: ' . mysqli_stmt_error($insertStmt));
    echo "Error";
}
mysqli_stmt_close($insertStmt);

mysqli_close($conn);


?>