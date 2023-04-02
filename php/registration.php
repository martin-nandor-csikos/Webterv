<?php
//databaseConnection.php importálása
require "databaseConnection.php";

//connect függvény meghívása a databaseConnection-ből
connect();

//A method=POST-os form inputjainak eltárolása egy változóban
//Ezeket a változókat megtisztítjuk az egyéb nem oda illő karakterektől
$email = trim($_POST["email"]);
$fhnev = trim($_POST["fhnev"]);
$jelszo = trim($_POST["jelszo"]);
$veznev = trim($_POST["veznev"]);
$kernev = trim($_POST["kernev"]);
$szuldatum = filter_var(trim($_POST["szuldatum"]), FILTER_SANITIZE_EMAIL);
$nem = $_POST["nem"];

$hibak[] = "";


//Ha a formon belül minden inputba került adat
if (isset($email) && isset($fhnev) && isset($jelszo) && isset($veznev) && isset($kernev) && isset($szuldatum) && isset($nem)) {
    //Jelszó hashelése --> biztonsági okok miatt
    //$jelszo a formon belül megadott jelszó, PASSWORD_DEFAULT a hashelés metódusa
    $hasheltJelszo = password_hash($jelszo, PASSWORD_DEFAULT);


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hibak[] = "Hibás e-mail formátum.";
    }
    if (strlen($email) > 255) {
        $hibak[] = "Túl hosszú az e-mail cím. Maximum 255 karakterből kell állnia.";
    }
    if (strlen($fhnev) > 255 || strlen($fhnev) < 3) {
        $hibak[] = "Túl hosszú vagy rövid a felhasználónév. Minimum 3, maximum 255 karakterből kell állnia.";
    }
    if (strlen($jelszo) < 6 || strlen($jelszo) > 255) {
        $hibak[] = "Túl hosszú vagy rövid a jelszó. Minimum 6, maximum 255 karakterből kell állnia.";
    }
    if (strlen($veznev) < 2 || strlen($veznev) > 255) {
        $hibak[] = "Túl hosszú vagy rövid a keresztnév. Minimum 2, maximum 255 karakterből kell állnia.";
    }
    if (strlen($kernev) < 2 || strlen($kernev) > 255) {
        $hibak[] = "Túl hosszú vagy rövid a vezetéknév. Minimum 2, maximum 255 karakterből kell állnia.";
    }
    if (!datumValidalas($szuldatum)) {
        $hibak[] = "Hibás dátum formátum. Helyes formátum: YYYY.MM.DD";
    }
    if ($nem != "ferfi" || $nem != "no" || $nem != "egyeb") {
        $hibak[] = "Hibás nem. Az érték csak férfi, nő, vagy egyéb lehet.";
    }


    //Ha nincs semmilyen hiba
    if (empty($hibak)) {
        //SQL adatbázisba, a users táblába bekerülnek az adatok
        //Query = utasítás
        //(email, fhnev, jelszo...) --> az email, fhnev, jelszo...sorokba kerülnek az értékek
        //VALUES ($email, $fhnev...) --> a formban megadott adatok
        $sqlQuery = "INSERT INTO users (email, fhnev, jelszo, veznev, kernev, szuldatum, nem) VALUES ($email, $fhnev, $hasheltJelszo, $veznev, $kernev, $szuldatum, $nem)";

        //Ha sikerült elvégezni az utasítást (bekerültek az adatok a táblába)
        if ($csatlakozas->query($sqlQuery) === TRUE) {
            //Átirányítás a bejelentkezett oldalra
        } else {
            echo "Hiba: " . $sqlQuery . "<br>" . $csatlakozas->error;
        }
    } else {
        //Végigmegyünk a hibákon, és kiiratjuk
        foreach ($hibak as $hiba) {
            echo $hiba;
        }
    }
}

//Adatbázis csatlakozásának megszüntetése
disconnect();

//A születési dátum validálására szolgáló function
function datumValidalas ($datum, $format = 'Y.m.d') {
    //$d változóban létrehozunk egy formátumot
    $d = DateTime::createFromFormat($format, $datum);

    //ha a létrehozott formátum az megegyezik az átadott dátum formátumával, akkor igaz lesz, ha nem, hamis
    return $d && $d->format($format) === $datum;
}
?>