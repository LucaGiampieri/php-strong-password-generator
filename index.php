<?php

include_once "./functions.php";

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

    <form method="GET" action="result.php">

    <!-- Lunghezza -->
     <fieldset>

    <legend>Lunghezza Password</legend>

    <label for="lunghezza">Scegli il numero dei caratteri</label>
    <input 
        id="lunghezza" 
        type="number" 
        name="lunghezza" 
        required
        min="1"
    >
     </fieldset>

    <!-- Ripetizione caratteri -->
    <fieldset>
        <legend>Ripetizione Caratteri</legend>

        <label for="repeat-yes">Sì</label>
        <input 
            id="repeat-yes" 
            type="radio" 
            name="repeat" 
            value="yes"
        >

        <label for="repeat-no">No</label>
        <input 
            id="repeat-no" 
            type="radio" 
            name="repeat" 
            value="no"
        >
    </fieldset>

    <!-- Tipi di caratteri -->
    <fieldset>
        <legend>Tipo di caratteri</legend>

        <label>
            <input type="checkbox" name="lowercase" value="1">
            Minuscole
        </label>

        <label>
            <input type="checkbox" name="uppercase" value="1">
            Maiuscole
        </label>

        <label>
            <input type="checkbox" name="numbers" value="1">
            Numeri
        </label>

        <label>
            <input type="checkbox" name="symbols" value="1">
            Simboli
        </label>
    </fieldset>

    <button type="submit">Crea Password</button>

</form>

</div>

</body>
</html>