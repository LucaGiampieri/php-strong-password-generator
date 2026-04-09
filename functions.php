<?php

function randomPassGenerator($lunghezza = 10)
{
    $caratteri = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#$%&-_?';
    $stringa = '';

    for ($i = 0; $i < $lunghezza; $i++) {
        $stringa .= $caratteri[random_int(0, strlen($caratteri) - 1)];
    }

    return $stringa;
}
