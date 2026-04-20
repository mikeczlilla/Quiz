<?php
unset($_SESSION['quiz_questions'], $_SESSION['current_index'], $_SESSION['score'], $_SESSION['quiz_finished'], $_SESSION['totalQuestions']);
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esport";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
<!doctype html>
<html lang="hu">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kvíz</title>
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
  <link rel="stylesheet" href="css/fooldal.css">
</head>

<body>
  <img class="logo" style="width: 100px; position: absolute; top: 30px; left: 30px; border-radius: 10px;" src="kep/quiz.logo.png" alt="logo">
  <h1 id="udvozles">Üdvözlünk, <?php echo $_SESSION["fnev"]; ?>!</h1>

  <div class="card">
    <div class="card-body" id="body1">
      <h2>Válassz a kvízek közül:</h2>
      <div class="container">

        <div class="card" id="kartya1">
          <div class="card-body">
            <h3 class="card-title"><img src="kep/ballot.svg" alt="icon"> Kvíz 1</h3>
            <p class="card-text">Legyen ön is milliomos!</p>
            <a href="kviz1.php" class="btn btn-primary">Kvíz Indítása</a>
          </div>
        </div>

        <div class="card" id="kartya2">
          <div class="card-body">
            <h3 class="card-title"><img src="kep/ballot.svg" alt="icon"> Kvíz 2</h3>
            <p class="card-text">Igaz vagy Hamis?</p>
            <a href="kviz2.php" class="btn btn-primary">Kvíz Indítása</a>
          </div>
        </div>

        <div class="card" id="kartya3">
          <div class="card-body">
            <h3 class="card-title"><img src="kep/ballot.svg" alt="icon"> Kvíz 3</h3>
            <p class="card-text">Legyen ön is milliomos!</p>
            <a href="kviz3.php" class="btn btn-primary">Kvíz Indítása</a>
          </div>
        </div>

      </div>
      <form action="" id="kilepes">
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
                <button type="submit" formaction="index.php" class="btn btn-danger">Kilépés</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>

</html>