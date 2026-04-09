<?php

///////////// RECUPERO DATI DAL FORM

// Se l'utente ha inserito la lunghezza la uso, altrimenti uso 10 come valore di default
$lunghezza = isset($_GET['lunghezza']) ? (int) $_GET['lunghezza'] : 10;

// Se esiste "repeat" lo prendo, altrimenti metto "yes"
$repeat = $_GET['repeat'] ?? 'yes';

// Le checkbox funzionano così:
// se sono selezionate allora esistono in quanto true
// se non sono selezionate allora non esistono in quanto false
$lowercase = isset($_GET['lowercase']);
$uppercase = isset($_GET['uppercase']);
$numbers   = isset($_GET['numbers']);
$symbols   = isset($_GET['symbols']);

///////////// COSTRUZIONE STRINGA CARATTERI

// Qui costruisco tutti i caratteri possibili in base alle scelte,
// partiamo da una stringa vuota e mano a mano aggiungiamo quello che è stato selezionato
$caratteri = '';

// Se $lowercase esiste aggiungo 'abcdefghijklmnopqrstuvwxyz'
if ($lowercase) {
    $caratteri .= 'abcdefghijklmnopqrstuvwxyz';
}

// Se $uppercase esiste aggiungo 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
if ($uppercase) {
    $caratteri .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
}

// Se $numbers esiste aggiungo '0123456789'
if ($numbers) {
    $caratteri .= '0123456789';
}

// Se $symbols esiste aggiungo !#$%&-_?'
if ($symbols) {
    $caratteri .= '!#$%&-_?';
}

///////////// CONTROLLO ERRORI

// Se non ha selezionato nessun tipo di carattere da errore
if ($caratteri === '') {
    $errore = "Seleziona almeno un tipo di carattere!";
}

///////////// GENERAZIONE PASSWORD

// Creiamo una variabile password vuota
$password = '';

// Procedo solo se non ci sono errori
if (!isset($errore)) {

    // Con ripetizione
    if ($repeat === 'yes') {

        // Ripeto per il numero di caratteri richiesti
        for ($i = 0; $i < $lunghezza; $i++) {

            // Prendo un carattere casuale dalla stringa e lo aggiungo alla password
            $password .= $caratteri[random_int(0, strlen($caratteri) - 1)];
        }

    }
    // Senza ripetizione
    else {

        // Trasformo la stringa in array
        $array = str_split($caratteri);

        // Mescolo casualmente l'array
        shuffle($array);

        // Se la lunghezza richiesta è maggiore dei caratteri disponibili da errore
        if ($lunghezza > count($array)) {
            $errore = "Troppi caratteri richiesti senza ripetizione!";
        } else {

            // Prendo solo i primi N caratteri ($lunghezza) e li unisco in una stringa finale
            $password = implode('', array_slice($array, 0, $lunghezza));
        }
    }
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

    <!-- MOSTRA ERRORE -->

    <?php if (isset($errore)): ?>
        <!-- Se esiste un errore lo mostro -->
        <h2><?= $errore ?></h2>
    <?php endif; ?>

    <!-- MOSTRA PASSWORD -->

    <?php if ($password): ?>
        <!-- Se la password esiste la mostro -->
        <h2>Password generata:</h2>
        <p><?= $password ?></p>
    <?php endif; ?>

    <a class="back-to-home" href="./index.php">Torna indietro</a>

</div>

</body>
</html>