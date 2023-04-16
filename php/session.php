<?php
//Session elindítása
function startSession() {
    session_start();
}

function setSessionData($fhnev) {
    //User felhasználónevének eltárolása
    $_SESSION['fhnev'] = $fhnev;
}

//Session befejezése
function stopSession() {
    session_unset();
    session_destroy();
}

//Vizsgálat, hogy a user épp be van-e jelentkezve
function checkSession() {
    //Ha nincs beállítva a sessionben a felhasználónév (= nincs elindított session)
    if (!isset($_SESSION['fhnev'])) {
        //Átirányítás a bejelentkező oldalra
        header("Location: ./loginPage.php");
    }
}

function checkIfLoggedIn() {
    if (isset($_SESSION['fhnev'])) {
        //Átirányítás a bejelentkező oldalra
        header("Location: ./hirek.php");
    }   
}
?>