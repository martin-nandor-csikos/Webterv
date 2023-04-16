<?php
require "databaseConnection.php";
connect();

$fhnev = $_POST['fhnev'];

//Több tábla esetén bővítés
$deleteUsers = "DELETE FROM users WHERE fhnev='$fhnev'";
$deletePrivate_messages = "DELETE FROM private_messages WHERE sentTo='$fhnev' OR sentFrom='$fhnev'";

if ($csatlakozas->query($deleteUsers) === TRUE && $csatlakozas->query($deletePrivate_messages) === TRUE) {
    header("Location: ./../adminPage.php");
} else {
    echo "Hiba.";
}

disconnect();
?>