<?php
require "databaseConnection.php";
require "dateValidation.php";
require "session.php";
startSession();
connect();

$ujEmail = filter_var(trim($_POST["ujEmail"], FILTER_SANITIZE_EMAIL));
$ujVeznev = trim($_POST['ujKernev']);
$ujKernev = trim($_POST['ujKernev']);
$ujFhnev = trim($_POST['ujFhnev']);
$ujJelszo = trim($_POST['ujJelszo']);
$ujJelszoIsm = trim($_POST['ujJelszoIsm']);
$ujSzuldatum = trim($_POST['ujSzuldatum']);
$ujNem = $_POST['ujNem'];
$veznev_publikus = $_POST['veznev_publikus'];
$kernev_publikus = $_POST['kernev_publikus'];
$email_publikus = $_POST['email_publikus'];
$nem_publikus = $_POST['nem_publikus'];
$szuldatum_publikus = $_POST['szuldatum_publikus'];
$bio = $_POST['bio'];

$hibak = [];
$id = $_SESSION['id'];

//Megnézzük, melyik input lett kitöltve
//Amelyik ki lett töltve, azt validáljuk
//Ha minden jó, akkor végrehajtjuk
if (isset($ujEmail) && $ujEmail != "") {
    if (!filter_var($ujEmail, FILTER_VALIDATE_EMAIL)) {
        $hibak[] = "Hibás e-mail formátum.";
    } else if (strlen($ujEmail) > 255) {
        $hibak[] = "Túl hosszú az e-mail cím. Maximum 255 karakterből kell állnia.";
    } else {
        $sqlQuery = "UPDATE users SET email='$ujEmail' WHERE id=$id";
        $csatlakozas->query($sqlQuery);
    }
}
if (isset($ujVeznev) && $ujVeznev != "") {
    if (strlen($ujVeznev) < 2 || strlen($ujVeznev) > 255) {
        $hibak[] = "Túl hosszú vagy rövid a vezetéknév. Minimum 2, maximum 255 karakterből kell állnia.";
    } else {
        $sqlQuery = "UPDATE users SET veznev='$ujVeznev' WHERE id=$id";
        $csatlakozas->query($sqlQuery);
    }
}
if (isset($ujKernev) && $ujKernev != "") {
    if (strlen($ujKernev) < 2 || strlen($ujKernev) > 255) {
        $hibak[] = "Túl hosszú vagy rövid a keresztnév. Minimum 2, maximum 255 karakterből kell állnia.";
    } else {
        $sqlQuery = "UPDATE users SET kernev='$ujKernev' WHERE id=$id";
        $csatlakozas->query($sqlQuery);
    }
}
if (isset($ujFhnev) && $ujFhnev != "") {
    if (strlen($ujFhnev) > 255 || strlen($ujFhnev) < 3) {
        $hibak[] = "Túl hosszú vagy rövid a felhasználónév. Minimum 3, maximum 255 karakterből kell állnia.";
    } else {
        $sqlQuery = "UPDATE users SET fhnev='$ujFhnev' WHERE id=$id";
        $csatlakozas->query($sqlQuery);
    }
}
if (isset($ujJelszo) && isset($ujJelszoIsm) && $ujJelszo != "" && $ujJelszoIsm != "") {
    if ($ujJelszo != $ujJelszoIsm) {
        $hibak[] = "A megadott 2 jelszó nem egyezik meg.";
    } else if (strlen($ujJelszo) < 6 || strlen($ujJelszo) > 255) {
        $hibak[] = "Túl hosszú vagy rövid a jelszó. Minimum 6, maximum 255 karakterből kell állnia.";
    } else {
        $ujHasheltJelszo = password_hash($ujJelszo, PASSWORD_DEFAULT);
        $sqlQuery = "UPDATE users SET jelszo='$ujHasheltJelszo' WHERE id=$id";
        $csatlakozas->query($sqlQuery);
    }
}
if (isset($ujNem) && $ujNem != "") {
    if ($ujNem != "ferfi" && $ujNem != "no" && $ujNem != "egyeb") {
        $hibak[] = "Hibás nem. Az érték csak férfi, nő, vagy egyéb lehet.";
    } else {
        $sqlQuery = "UPDATE users SET nem='$ujNem' WHERE id=$id";
        $csatlakozas->query($sqlQuery);
    }
}
if (isset($ujSzuldatum) && $ujSzuldatum != "") {
    if (!datumValidalas($szuldatum)) {
        $hibak[] = "Hibás dátum formátum. Helyes formátum: YYYY.MM.DD";
    } else {
        $sqlQuery = "UPDATE users SET szuldatum='$ujSzuldatum' WHERE id=$id";
        $csatlakozas->query($sqlQuery);
    }
}

if (isset($bio) && $bio != "") {
    $sqlQuery = "UPDATE userprofile SET bio='$bio' WHERE userId=$id";
    $csatlakozas->query($sqlQuery);
}

if (isset($veznev_publikus) && $veznev_publikus != "") {
    if ($veznev_publikus != 0 && $veznev_publikus != 1) {
        $hibak[] = "Hibás érték. Az érték csak privát, vagy publikus lehet.";
    } else {
        $sqlQuery = "UPDATE userprofile SET veznev_publikus='$veznev_publikus' WHERE userId=$id";
        $csatlakozas->query($sqlQuery);
    }
}

if (isset($kernev_publikus) && $kernev_publikus != "") {
    if ($kernev_publikus != 0 && $kernev_publikus != 1) {
        $hibak[] = "Hibás érték. Az érték csak privát, vagy publikus lehet.";
    } else {
        $sqlQuery = "UPDATE userprofile SET kernev_publikus=$kernev_publikus WHERE userId=$id";
        $csatlakozas->query($sqlQuery);
    }
}

if (isset($email_publikus) && $email_publikus != "") {
    if ($email_publikus != 0 && $email_publikus != 1) {
        $hibak[] = "Hibás érték. Az érték csak privát, vagy publikus lehet.";
    } else {
        $sqlQuery = "UPDATE userprofile SET email_publikus='$email_publikus' WHERE userId=$id";
        $csatlakozas->query($sqlQuery);
    }
}

if (isset($szuldatum_publikus) && $szuldatum_publikus != "") {
    if ($szuldatum_publikus != 0 && $szuldatum_publikus != 1) {
        $hibak[] = "Hibás érték. Az érték csak privát, vagy publikus lehet.";
    } else {
        $sqlQuery = "UPDATE userprofile SET szuldatum_publikus='$szuldatum_publikus' WHERE userId=$id";
        $csatlakozas->query($sqlQuery);
    }
}

if (isset($nem_publikus)) {
    if ($nem_publikus != 0 && $nem_publikus != 1) {
        $hibak[] = "Hibás érték. Az érték csak privát, vagy publikus lehet.";
    } else {
        $sqlQuery = "UPDATE userprofile SET nem_publikus='$nem_publikus' WHERE userId=$id";
        $csatlakozas->query($sqlQuery);
    }
}

if (count($hibak) != 0) {
    foreach ($hibak as $hiba) {
        echo $hiba . "<br><br>";
    }
} else {
    header("Location: ./../changeUserInfoPage.php");
}

disconnect();
?>