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
  $randomszam = rand(1, 15);
  $sql = "SELECT kerdes, jo_valasz, rossz_valasz1, rossz_valasz2, rossz_valasz3 FROM kerdesek1 WHERE id = '$randomszam'";
  $result = mysqli_query($conn, $sql);

  $tomb = [];

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $kerdes = $row['kerdes'];
    $jo_valasz = $row['jo_valasz'];
    $rossz_valasz1 = $row['rossz_valasz1'];
    $rossz_valasz2 = $row['rossz_valasz2'];
    $rossz_valasz3 = $row['rossz_valasz3'];
    $tomb[] = $jo_valasz;
    $tomb[] = $rossz_valasz1;
    $tomb[] = $rossz_valasz2;
    $tomb[] = $rossz_valasz3;
  }
  $szamlalo = 0;

  if (isset($_POST['valasz1']) && $_POST['valasz1'] == $jo_valasz) {
    $szamlalo++;
  }
  if (isset($_POST['valasz2']) && $_POST['valasz2'] == $jo_valasz) {
    $szamlalo++;
  }
  if (isset($_POST['valasz3']) && $_POST['valasz3'] == $jo_valasz) {
    $szamlalo++;
  }
  if (isset($_POST['valasz4']) && $_POST['valasz4'] == $jo_valasz) {
    $szamlalo++;
  }

  shuffle($tomb);
  ?>
  <!DOCTYPE html>
  <html lang="hu">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kvíz 1</title>

    <link rel="icon" type="image/png" href="favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="favicon/favicon.svg" />
    <link rel="shortcut icon" href="favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png" />
    <link rel="manifest" href="favicon/site.webmanifest" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
      integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
      crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/kviz.css">
  </head>

  <body>
    <img style="width: 100px; position: absolute; top: 30px; left: 30px; border-radius: 10px;" class="logo" src="kep/quiz.logo.png" alt="logo">
    <div class="card">
      <div class="card-body" id="body1">
        <h5 style="text-align: end;">Pontok: <?php echo $szamlalo; ?></h5>
        <form action="./php/quiz_back.php" method="post">
          <h2><?php echo $kerdes; ?></h2>
          <div id="buttons">
            <form action="" method="post">
              <button type="submit" name="valasz1" value="<?php echo $tomb[0]; ?>" class="btn btn-primary"><?php echo $tomb[0]; ?></button>
              <button type="submit" name="valasz2" value="<?php echo $tomb[1]; ?>" class="btn btn-primary"><?php echo $tomb[1]; ?></button>
              <button type="submit" name="valasz3" value="<?php echo $tomb[2]; ?>" class="btn btn-primary"><?php echo $tomb[2]; ?></button>
              <button type="submit" name="valasz4" value="<?php echo $tomb[3]; ?>" class="btn btn-primary"><?php echo $tomb[3]; ?></button>
            </form>
          </div>
        </form>
      </div>
    </div>

    <form action="" id="kilepes" style="position: absolute; left: 30px; top: 180px;">
      <button type="button" id="kilepes" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Kilépés
      </button>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Biztos ki akarsz lépni?</h1>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégse</button>
              <button type="submit" formaction="fooldal.php" class="btn btn-primary">Kilépés</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </body>

  </html>