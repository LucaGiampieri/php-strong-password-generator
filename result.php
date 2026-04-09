<?php

include_once "./functions.php";

$password = "";

if (isset($_GET['lunghezza'])) {
    $lunghezza = (int) $_GET['lunghezza'];
    $password = randomPassGenerator($lunghezza);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>php-strong-password-generator</title>
</head>
<body>

<header>
    <h1 class="title">Generatore di Password Randomiche e Sicure</h1>
    <hr>
</header>

<div class="container">

    <?php if ($password): ?>
        <h2>Password generata:</h2>
        <p><?= $password ?></p>
    <?php endif; ?>

    <a class="back-to-home"  href="./index.php">
        Torna alla pagina precedente
    </a>

</div>

</body>
</html>