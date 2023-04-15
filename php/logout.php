<?php
require "session.php";

$kijelentkezes = $_POST['kijelentkezes'];

//Ha a kijelentkezés gombra nyomunk, töröljük a sessiont, és visszairányítjuk a usert a főoldalra
if (isset($kijelentkezes)) {
    startSession();
    stopSession();
    header('Location: ./../loginPage.php');
}
?>