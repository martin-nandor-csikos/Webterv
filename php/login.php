<?php
require "databaseConnection.php";
connect();

$fhnev = $_POST['fhnev'];
$jelszo = $_POST['jelszo'];

if (isset($fhnev) && isset($jelszo)) {
    $sqlQuery = "SELECT * FROM users";

    foreach ($sqlQuery as $felhasznalo) {
        if ($felhasznalo == $fhnev && password_verify($jelszo, $felhasznalo['jelszo'])) {
            //Átirányítás
            break;
        }
    }
}

disconnect();
?>