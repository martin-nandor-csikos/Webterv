<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>
    <link rel="stylesheet" href="styles.css">

    <?php
        require "./php/session.php";
        startSession();
        checkIfLoggedIn();
    ?>
</head>
<body>
    <header id="indexHeader">
        <!--Small info bar-->
        <div id="infoBar">
            <div id="closingHours">
                <p>Nyitvatartás: Hétfő - Szombat, 8:00 - 20:00</p>
            </div>

            <div id="phoneNumber">
                <p>Tel.: +36-99-999-9999</p>
            </div>

            <div id="location">
                <p>6726 Szeged, X körút 7</p>
            </div>
        </div>

        <!--Name-->
        <div id="name">
            <h1>Szegedi Kutyamenhely Alapítvány</h1>
            <h2>SZKA</h2>
        </div>

        <!--Menu bar-->
        <nav id="menuBar">
            <a style="padding-left: 150px; padding-right: 150px;" href="index.html" id="backtoindex" class="notActive">Kilépés a fórumból</a>
            <a style="padding-left: 150px; padding-right: 150px;" href="#" id="registration" class="active">Regisztráció</a>
            <a style="padding-left: 150px; padding-right: 150px;" href="loginPage.php" id="login" class="notActive">Bejelentkezés</a>
        </nav>
    </header>
    <form id="registrationform" action="./php/registration.php" method="POST">
        <label class="labels" for="email">E-mail (max 255 karakter)</label>
        <br>
        <input class="szoveges" id="email" type="email" name="email" maxlength="255">
        <br><br>

        <label class="labels" for="fhnev">Felhasználónév (max 255 karakter, minimum 3 karakter)</label>
        <br>
        <input class="szoveges" id="fhnev" type="text" name="fhnev" maxlength="255" minlength="3">
        <br><br>

        <label class="labels" for="veznev">Vezetéknév (max 255 karakter, minimum 2 karakter)</label>
        <br>
        <input class="szoveges" id="veznev" type="text" name="veznev" maxlength="255" minlength="2">
        <br><br>

        <label class="labels" for="kernev">Keresztnév (max 255 karakter, minimum 2 karakter)</label>
        <br>
        <input class="szoveges" id="kernev" type="text" name="kernev" maxlength="255" minlength="2">
        <br><br>

        <label class="labels" for="jelszo">Jelszó (max 255 karakter, minimum 6 karakter)</label>
        <br>
        <input class="szoveges" id="jelszo" type="password" name="jelszo" maxlength="255" minlength="6">
        <br><br>

        <label class="labels" for="jelszoIsm">Jelszó ismét (max 255 karakter, minimum 6 karakter)</label>
        <br>
        <input class="szoveges" id="jelszoIsm" type="password" name="jelszoIsm" maxlength="255" minlength="6">
        <br><br>

        <label class="labels" for="szuldatum">Születési dátum</label>
        <br>
        <input type="date" id="szuldatum" name="szuldatum">
        <br><br>

        <br>
        <ul class="hideListStyle">
            <li>
                <input class="radio" id="ferfi" type="radio" name="nem" value="ferfi">
                <label class="labels" for="ferfi">Férfi</label>
            </li>
            <li>
                <input class="radio" id="no" type="radio" name="nem" value="no">
                <label class="labels" for="no">Nő</label>
            </li>
            <li>
                <input class="radio" id="egyeb" type="radio" name="nem" value="egyeb">
                <label class="labels" for="egyeb">Egyéb</label>
            </li>
        </ul>

        <input type="submit" value="Elküldés">
    </form>
</body>
</html>