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

    <form method="GET">
        <label>Lunghezza Password</label>
        <input type="number" name="lunghezza" required>
        <button type="submit">Crea Password</button>
    </form>

    <?php if ($password): ?>
        <h2>Password generata:</h2>
        <p><?= $password ?></p>
    <?php endif; ?>

</div>

</body>
</html>