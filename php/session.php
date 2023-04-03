<?php
//TESZTELNI KELL A FUNCTIONÖKET

//Session elindítása
function startSession($fhnev) {
    session_start();

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
        echo "Nem vagy bejelentkezve.";
    }
}
?>