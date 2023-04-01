<?php
$csatlakozas = null;

//Az adatbázishoz való csatlakozás
function connect() {
    $sqlSzerver = "localhost";
    $sqlFhnev = "root";
    $sqlJelszo = "";
    
    //Létrehoz egy új MySQL objektumot, ami a csatlakozást biztosítja
    //Ehhez kell a szerver neve (ami lokális, tehát localhost lesz ebben az esetben)
    //A MySQL adatbázisok eléréséhez a felhasználónév (alapértelmezetten XAMPP-ban "root")
    //És a jelszó (alapértelmezetten az XAMPP-ban üres, tehát nincs jelszó)
    //global $csatlakozas --> a globális változó elérése (fentebb létrehozva), így nem kell a functionnek átpasszolni a változót 
    $csatlakozas = new mysqli($sqlSzerver, $sqlFhnev, $sqlJelszo);
    
    //Ha a csatlakozas egy hibához vezetett (nem tudott valamiért csatlakozni az adatbázishoz), akkor leáll a kód (die), és kiírja a hibát
    if ($csatlakozas->connect_error) {
        die("Adatbázis csatlakozási hiba: " . $csatlakozas->connect_error);
    }
}

//Az adatbázis csatlakozásának megszüntetése
function disconnect() {
    $csatlakozas->close();
}
?>