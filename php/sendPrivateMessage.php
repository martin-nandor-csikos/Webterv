<?php
require "databaseConnection.php";
require "session.php";
connect();
startSession();

//Változók
$kinek = $_POST['kinek'];
$ki = $_SESSION['fhnev'];
$uzenet = $_POST['uzenet'];

//Ha az üzenet inputban van szöveg
if (isset($uzenet) && $uzenet != " ") {
    $searchUser = "SELECT fhnev FROM users WHERE '$kinek'=fhnev";
    $eredmeny = $csatlakozas->query($searchUser);

    if ($eredmeny->num_rows == 0) {
        die("Nincs ilyen felhasználónév, akinek címzed az üzenetet.");
    }

    //Elhelyezzük az adatokat az adatbázisban
    $sqlQuery = "INSERT INTO private_messages (sentTo, sentFrom, message) VALUES ('$kinek', '$ki', '$uzenet')";

    //Ha sikeresen el lettek helyezve az adatok
    if ($csatlakozas->query($sqlQuery) === TRUE) {
        header('Location: ./../privateMessages.php');
    } else {
        echo "Hiba: " . $csatlakozas->error;
    }
}

disconnect();
?>