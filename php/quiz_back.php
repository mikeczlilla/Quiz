<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT kerdes, jo_valasz, rossz_valasz1, rossz_valasz2, rossz_valasz3 FROM kerdesek1 WHERE id = 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["kerdes"] = $row['kerdes'];
    $_SESSION["jo_valasz"] = $row['jo_valasz'];
    $_SESSION["rossz_valasz1"] = $row['rossz_valasz1'];
    $_SESSION["rossz_valasz2"] = $row['rossz_valasz2'];
    $_SESSION["rossz_valasz3"] = $row['rossz_valasz3'];
}
?>