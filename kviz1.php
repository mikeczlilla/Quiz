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
$randomszam = rand(1, 7);

$sql = "SELECT kerdes, jo_valasz, rossz_valasz1, rossz_valasz2, rossz_valasz3 FROM kerdesek1 WHERE id = '$randomszam'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $kerdes = $row['kerdes'];
  $jo_valasz = $row['jo_valasz'];
  $rossz_valasz1 = $row['rossz_valasz1'];
  $rossz_valasz2 = $row['rossz_valasz2'];
  $rossz_valasz3 = $row['rossz_valasz3'];
}
?>
<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kvíz 1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
    integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="kviz.css">
</head>

<body>
  <div class="card">
    <div class="card-body" id="body1">
      <form action="./php/quiz_back.php" method="post">
        <h2><?php echo $kerdes; ?></h2>
        <div>
          <button type="submit" name="valasz" value="1" class="btn btn-primary"><?php echo $jo_valasz; ?></button>
          <button type="submit" name="valasz" value="2" class="btn btn-primary"><?php echo $rossz_valasz1; ?></button>
          <button type="submit" name="valasz" value="3" class="btn btn-primary"><?php echo $rossz_valasz2; ?></button>
          <button type="submit" name="valasz" value="4" class="btn btn-primary"><?php echo $rossz_valasz3; ?></button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>