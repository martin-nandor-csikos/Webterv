<?php
//A születési dátum validálására szolgáló function
function datumValidalas ($datum, $format = 'Y-m-d') {
    //$d változóban létrehozunk egy formátumot
    $d = DateTime::createFromFormat($format, $datum);

    //ha a létrehozott formátum az megegyezik az átadott dátum formátumával, akkor igaz lesz, ha nem, hamis
    return $d && $d->format($format) === $datum;
}
?>