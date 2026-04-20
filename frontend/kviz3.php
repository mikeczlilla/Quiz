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

if (!isset($_SESSION['quiz_questions3'])) {

  $sql = "SELECT id, kerdes, jo_valasz, rossz_valasz1, rossz_valasz2, rossz_valasz3 FROM kerdesek3 ORDER BY RAND()";
  $result = mysqli_query($conn, $sql);

  $questions = [];
  while ($row = mysqli_fetch_assoc($result)) {

    $answers = [
      $row['jo_valasz'],
      $row['rossz_valasz1'],
      $row['rossz_valasz2'],
      $row['rossz_valasz3']
    ];
    shuffle($answers);

    $questions[] = [
      'id' => $row['id'],
      'kerdes' => $row['kerdes'],
      'jo_valasz' => $row['jo_valasz'],
      'answers' => $answers
    ];
  }

  $_SESSION['quiz_questions3'] = $questions;
  $_SESSION['current_index3'] = 0;
  $_SESSION['score3'] = 0;
  $_SESSION['quiz_finished3'] = false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$_SESSION['quiz_finished3']) {
  $currentIndex = $_SESSION['current_index3'];
  $questions = $_SESSION['quiz_questions3'];

  if (isset($questions[$currentIndex])) {
    $correct_Answer = $questions[$currentIndex]['jo_valasz'];
    $userAnswer = $_POST['answer'] ?? '';

    if ($userAnswer === $correct_Answer) {
      $_SESSION['score3']++;
    }

    $_SESSION['current_index3']++;

    if ($_SESSION['current_index3'] >= count($questions)) {
      $_SESSION['quiz_finished3'] = true;
    }
  }

  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
}

$currentIndex = $_SESSION['current_index3'];
$questions = $_SESSION['quiz_questions3'];
$finished = $_SESSION['quiz_finished3'];
$score = $_SESSION['score3'];

if ($finished || empty($questions)) {
  $totalQuestions = count($questions);
  $_SESSION['totalQuestions'] = $totalQuestions;
  $_SESSION['score'] = $score;
  header("Location: end_page.php");
}
?>


<?php
$currentQuestion = $questions[$currentIndex];
?>
<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kvíz 3</title>

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
      <h5 style="text-align: end;">Pontok: <?php echo $score; ?> / <?php echo count($questions); ?></h5>
      <form method="post">
        <h2><?php echo ($currentIndex + 1) . ". " . htmlspecialchars($currentQuestion['kerdes']); ?></h2>
        <div id="buttons">
          <?php foreach ($currentQuestion['answers'] as $answer): ?>
            <button type="submit" name="answer" value="<?php echo htmlspecialchars($answer); ?>" class="btn btn-primary">
              <?php echo htmlspecialchars($answer); ?>
            </button>
          <?php endforeach; ?>
        </div>
      </form>
    </div>
  </div>

  <form id="kilepes" style="position: absolute; left: 30px; top: 180px;">
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
            <button type="submit" formaction="fooldal.php" class="btn btn-danger">Kilépés</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>