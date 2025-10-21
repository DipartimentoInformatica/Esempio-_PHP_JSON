<?php
$filename = 'utenti.json';

// Recupera i dati dal form
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';
$nome = $_POST['nome'] ?? '';
$cognome = $_POST['cognome'] ?? '';
$email = $_POST['email'] ?? '';



// Crea un nuovo utente
$nuovoUtente = [
  'login' => $login,
  'password' => $password,
  'nome' => $nome,
  'cognome' => $cognome,
  'email' => $email
];

// Leggi il file esistente o crea un array vuoto
$utenti = [];
if (file_exists($filename)) {
  $json = file_get_contents($filename);
  $utenti = json_decode($json, true);
  if (!is_array($utenti)) {
    $utenti = [];
  }
}

// Verifica se esiste già un utente con lo stesso login
$loginEsistente = false;
foreach ($utenti as $utente) {
  if ($utente['login'] === $login) {
    $loginEsistente = true;
    break;
  }
}

if ($loginEsistente) {
  // Mostra messaggio di errore
  echo <<<HTML
  <!DOCTYPE html>
  <html lang="it">
  <head>
    <meta charset="UTF-8">
    <title>Errore registrazione</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
  <div class="container vh-100 d-flex flex-column justify-content-center">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-body text-center">
            <h4 class="text-danger mb-3">Username già registrato</h4>
            <p>Il nome utente <strong>{$login}</strong> è già in uso. Scegli un login diverso.</p>
            <a href="registrazione.php" class="btn btn-outline-primary mt-3">Torna alla registrazione</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>
  </html>
  HTML;
  exit;
}

// Aggiungi il nuovo utente
$utenti[] = $nuovoUtente;

// Salva nel file JSON
file_put_contents($filename, json_encode($utenti, JSON_PRETTY_PRINT));

// Mostra conferma
echo <<<HTML
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Registrazione completata</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container vh-100 d-flex flex-column justify-content-center">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body text-center">
          <h4 class="text-success mb-3">Registrazione completata!</h4>
          <p>Benvenuto, <strong>{$nome} {$cognome}</strong></p>
          <a href="index.html" class="btn btn-primary mt-3">Vai al login</a>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
HTML;
?>
