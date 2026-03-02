<?php
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
  <title>Ötletláda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
    integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="fooldal.css">
</head>

<body>
  <h1 id="udvozles">Üdvözlünk, <?php echo $_SESSION["fnev"]; ?>!</h1>

  <div class="card">
    <div class="card-body">
      <form id="form1" method="post" action="php/otletlada.php">
        <div class="input-group" id="txtarea">
          <span class="input-group-text">Írd be az ötleted: </span>
          <textarea name="otlet" id="otlet" class="form-control" aria-label="With textarea"></textarea>

        </div>
        <button type="submit" id="kuldes" class="btn btn-success">Küldés</button>
      </form>
      <form action="" style="width: fit-content;">
        <button type="button" id="kilepes" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                <button type="submit" formaction="index.php" class="btn btn-primary">Kilépés</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>

</html>