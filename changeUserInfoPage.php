<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adatok megváltoztatása</title>
    <link rel="stylesheet" href="styles.css">

    <?php
        require "./php/session.php";
        startSession();
        checkSession();
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
            <a href="forum.html" id="forumpage" class="notActive">Fórum</a>
            <a href="searchUsersPage.php" id="search" class="notActive">Felhasználók keresése</a>
            <a href="index.html" id="backtoindex" class="notActive">Kilépés a fórumból</a>
            <a href="registrationPage.php" id="registration" class="notActive">Regisztráció</a>
            <a href="loginPage.php" id="login" class="notActive">Bejelentkezés</a>
            <a href="loggedIn.php" id="logout" class="notActive">Kijelentkezés</a>
            <a href="#" id="changeinfo" class="active">Profil módosítása</a>
        </nav>
    </header>
    <form id="changeinfoform" action="./php/changeUserInfo.php" method="POST">
        <label class="labels" for="ujEmail">Új e-mail</label>
        <br>
        <input class="szoveges" type="email" name="ujEmail" maxlength="255">
        <br><br>

        <label class="labels" for="ujFhnev">Új felhasználónév:</label>
        <br>
        <input class="szoveges" type="text" name="ujFhnev" maxlength="255" minlength="3">
        <br><br>

        <label class="labels" for="ujVeznev">Új vezetéknév</label>
        <br>
        <input class="szoveges" type="text" name="ujVeznev" maxlength="255" minlength="2">
        <br><br>

        <label class="labels" for="ujKernev">Új keresztnév</label>
        <br>
        <input class="szoveges" type="text" name="ujKernev" maxlength="255" minlength="2">
        <br><br>

        <label class="labels" for="ujJelszo">Új jelszó</label>
        <br>
        <input class="szoveges" type="password" name="ujJelszo" maxlength="255" minlength="6">
        <br><br>

        <label class="labels" for="ujJelszoIsm">Új jelszó ismét</label>
        <br>
        <input class="szoveges" type="password" name="ujJelszoIsm" maxlength="255" minlength="6">
        <br><br>

        <label class="labels" for="ujSzuldatum">Új szuletési dátum</label>
        <br>
        <input type="date" name="ujSzuldatum">
        <br><br>

        <label class="labels" for="ujNem">Új nem</label>
        <br>
        <ul>
            <li>
                <input class="radio" type="radio" name="ujNem" value="ferfi">
                <label class="labels" for="ujNem">Férfi</label>
            </li>
            <li>
                <input class="radio" type="radio" name="ujNem" value="no">
                <label class="labels" for="ujNem">Nő</label>
            </li>
            <li>
                <input class="radio" type="radio" name="ujNem" value="egyeb">
                <label class="labels" for="ujNem">Egyéb</label>
            </li>
        </ul>

        <input type="submit" value="Elküldés">
    </form>
</body>
</html>