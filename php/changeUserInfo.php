<?php
require "databaseConnection.php";
require "dateValidation.php";
connect();

$ujEmail = filter_var(trim($_POST["ujEmail"], FILTER_SANITIZE_EMAIL));
$ujVeznev = trim($_POST['ujKernev']);
$ujKernev = trim($_POST['ujKernev']);
$ujFhnev = trim($_POST['ujFhnev']);
$ujJelszo = trim($_POST['ujJelszo']);
$ujJelszoIsm = trim($_POST['ujJelszoIsm']);
$ujSzuldatum = trim($_POST['ujSzuldatum']);
$ujNem = $_POST['ujNem'];

$hibak = [];
$fhnev = $_SESSION['fhnev'];

//Megnézzük, melyik input lett kitöltve
//Amelyik ki lett töltve, azt validáljuk
//Ha minden jó, akkor végrehajtjuk
//FIXÁLNI: id-t kell vizsgálni fhnev helyett az SQL-ben (sessionön belül id eltárolás)
if (isset($ujEmail)) {
    if (!filter_var($ujEmail, FILTER_VALIDATE_EMAIL)) {
        $hibak[] = "Hibás e-mail formátum.";
    } else if (strlen($ujEmail) > 255) {
        $hibak[] = "Túl hosszú az e-mail cím. Maximum 255 karakterből kell állnia.";
    } else {
        $sqlQuery = "UPDATE users SET email='$ujEmail' WHERE fhnev=$fhnev";
        $csatlakozas->query($sqlQuery);
    }
}
if (isset($ujVeznev)) {
    if (strlen($ujVeznev) < 2 || strlen($ujVeznev) > 255) {
        $hibak[] = "Túl hosszú vagy rövid a vezetéknév. Minimum 2, maximum 255 karakterből kell állnia.";
    } else {
        $sqlQuery = "UPDATE users SET veznev='$ujVeznev'";
        $csatlakozas->query($sqlQuery);
    }
}
if (isset($ujKernev)) {
    if (strlen($ujKernev) < 2 || strlen($ujKernev) > 255) {
        $hibak[] = "Túl hosszú vagy rövid a keresztnév. Minimum 2, maximum 255 karakterből kell állnia.";
    } else {
        $sqlQuery = "UPDATE users SET kernev='$ujKernev'";
        $csatlakozas->query($sqlQuery);
    }
}
if (isset($ujFhnev)) {
    if (strlen($ujFhnev) > 255 || strlen($ujFhnev) < 3) {
        $hibak[] = "Túl hosszú vagy rövid a felhasználónév. Minimum 3, maximum 255 karakterből kell állnia.";
    } else {
        $sqlQuery = "UPDATE users SET fhnev='$ujFhnev'";
        $csatlakozas->query($sqlQuery);
    }
}
if (isset($ujJelszo) && isset($ujJelszoIsm)) {
    if ($ujJelszo != $ujJelszoIsm) {
        $hibak[] = "A megadott 2 jelszó nem egyezik meg.";
    } else if (strlen($ujJelszo) < 6 || strlen($ujJelszo) > 255) {
        $hibak[] = "Túl hosszú vagy rövid a jelszó. Minimum 6, maximum 255 karakterből kell állnia.";
    } else {
        $ujHasheltJelszo = password_hash($ujJelszo, PASSWORD_DEFAULT);
        $sqlQuery = "UPDATE users SET jelszo='$ujHasheltJelszo'";
        $csatlakozas->query($sqlQuery);
    }
}
if (isset($ujNem)) {
    if ($ujNem != "ferfi" && $ujNem != "no" && $ujNem != "egyeb") {
        $hibak[] = "Hibás nem. Az érték csak férfi, nő, vagy egyéb lehet.";
    } else {
        $sqlQuery = "UPDATE users SET nem='$ujNem'";
        $csatlakozas->query($sqlQuery);
    }
}
if (isset($ujSzuldatum)) {
    if (!datumValidalas($szuldatum)) {
        $hibak[] = "Hibás dátum formátum. Helyes formátum: YYYY.MM.DD";
    } else {
        $sqlQuery = "UPDATE users SET szuldatum='$ujSzuldatum'";
        $csatlakozas->query($sqlQuery);
    }
}

if (count($hibak) != 0) {
    foreach ($hibak as $hiba) {
        echo $hiba . "<br><br>";
    }
}

disconnect();
?>