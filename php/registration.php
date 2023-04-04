<?php
//databaseConnection.php importálása
require "databaseConnection.php";
require "dateValidation.php";

//connect függvény meghívása a databaseConnection-ből
connect();

//A method=POST-os form inputjainak eltárolása egy változóban
//Ezeket a változókat megtisztítjuk az egyéb nem oda illő karakterektől
$email = filter_var(trim($_POST["email"], FILTER_SANITIZE_EMAIL));
$fhnev = trim($_POST["fhnev"]);
$jelszo = trim($_POST["jelszo"]);
$jelszoIsm = trim($_POST["jelszoIsm"]);
$veznev = trim($_POST["veznev"]);
$kernev = trim($_POST["kernev"]);
$szuldatum = trim($_POST["szuldatum"]);
$nem = $_POST["nem"];

$hibak = [];


//Ha a formon belül minden inputba került adat
if (isset($email) && isset($fhnev) && isset($jelszo) && isset($jelszoIsm) && isset($veznev) && isset($kernev) && isset($szuldatum) && isset($nem)) {
    //Jelszó hashelése --> biztonsági okok miatt
    //$jelszo a formon belül megadott jelszó, PASSWORD_DEFAULT a hashelés metódusa
    $hasheltJelszo = password_hash($jelszo, PASSWORD_DEFAULT);


    //Adatok validálása
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
    if ($jelszo != $jelszoIsm) {
        $hibak[] = "A megadott 2 jelszó nem egyezik meg.";
    }
    if (strlen($veznev) < 2 || strlen($veznev) > 255) {
        $hibak[] = "Túl hosszú vagy rövid a vezetéknév. Minimum 2, maximum 255 karakterből kell állnia.";
    }
    if (strlen($kernev) < 2 || strlen($kernev) > 255) {
        $hibak[] = "Túl hosszú vagy rövid a keresztnév. Minimum 2, maximum 255 karakterből kell állnia.";
    }
    if (!datumValidalas($szuldatum)) {
        $hibak[] = "Hibás dátum formátum. Helyes formátum: YYYY.MM.DD";
    }
    if ($nem != "ferfi" && $nem != "no" && $nem != "egyeb") {
        $hibak[] = "Hibás nem. Az érték csak férfi, nő, vagy egyéb lehet.";
    }

    //Email cím és felhasználónév elérhetőségének vizsgálata
    $emailElerheto = "SELECT email FROM users WHERE email='$email'";
    $fhnevElerheto = "SELECT fhnev FROM users WHERE fhnev='$fhnev'";
    $emailQuery = $csatlakozas->query($emailElerheto);
    $fhnevQuery = $csatlakozas->query($fhnevElerheto);

    //Ha az utasítás miatt több sort kaptunk vissza (= van már olyan email cím vagy jelszó)
    if ($emailQuery->num_rows > 0) {
        $hibak[] = "Az e-mail cím foglalt.";
    }
    if ($fhnevQuery->num_rows > 0) {
        $hibak[] = "A felhasználónév foglalt.";
    }


    //Ha nincs semmilyen hiba
    if (count($hibak) === 0) {
        //SQL adatbázisba, a users táblába bekerülnek az adatok
        //Query = utasítás
        //(email, fhnev, jelszo...) --> az email, fhnev, jelszo...sorokba kerülnek az értékek
        //VALUES ($email, $fhnev...) --> a formban megadott adatok
        $sqlQuery = "INSERT INTO users (email, fhnev, jelszo, veznev, kernev, szuldatum, nem) VALUES ('$email', '$fhnev', '$hasheltJelszo', '$veznev', '$kernev', '$szuldatum', '$nem')";

        //Ha sikerült elvégezni az utasítást (bekerültek az adatok a táblába)
        if ($csatlakozas->query($sqlQuery) === TRUE) {
            //Átirányítás a bejelentkezési oldalra
            //header("Location: asd.php");
        } else {
            echo "Hiba: " . $sqlQuery . "<br>" . $csatlakozas->error;
        }
    } else {
        //Végigmegyünk a hibákon, és kiiratjuk
        foreach ($hibak as $hiba) {
            echo $hiba . "<br>";
        }
    }
}

//Adatbázis csatlakozásának megszüntetése
disconnect();
?>