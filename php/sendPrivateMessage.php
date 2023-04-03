<?php
require "databaseConnection.php";
connect();

//Változók
$kinek = $_POST['kinek'];
$ki = $_POST['ki'];
$uzenet = $_POST['uzenet'];

//Ha az üzenet inputban van szöveg
if (isset($uzenet) && $uzenet != " ") {
    //Elhelyezzük az adatokat az adatbázisban
    $sqlQuery = "INSERT INTO private_messages (sentTo, sentFrom, message) VALUES ('$kinek', '$ki', '$uzenet')";

    //Ha sikeresen el lettek helyezve az adatok
    if ($csatlakozas->query($sqlQuery) === TRUE) {
        header('Location: getPrivateMessage.php');
    } else {
        echo "Hiba: " . $csatlakozas->error;
    }
}

disconnect();
?>