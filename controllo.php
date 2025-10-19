<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Verifica Credenziali</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container vh-100 d-flex flex-column justify-content-center">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body text-center">

<?php
if (isset($_GET['login']) && isset($_GET['password'])) {
  $login = $_GET['login'];
  $password = $_GET['password'];

  $json = file_get_contents('utenti.json');
  $utenti = json_decode($json, true);
  $trovato = false;

  foreach ($utenti as $utente) {
    if ($utente['login'] === $login && $utente['password'] === $password) {
      echo "<h4 class='mb-3'>Benvenuto, {$utente['nome']} {$utente['cognome']}</h4>";
      echo "<p><strong>Login:</strong> {$utente['login']}</p>";
      echo "<p><strong>Email:</strong> {$utente['email']}</p>";
      $trovato = true;
      break;
    }
  }

  if (!$trovato) {
    echo "<h4 class='text-danger'>Credenziali errate</h4>";
  }
} else {
  echo "<h4 class='text-warning'>Login e password non ricevuti</h4>";
}
?>

        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
