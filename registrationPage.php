<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>
    <link rel="stylesheet" href="styles.css">
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
            <a href="searchUsersPage.php" id="search" class = "notActive">Felhasználók keresése</a>
            <a href="index.html" id="backtoindex" class="notActive">Kilépés a fórumból</a>
            <a href="#" id="registration" class="active">Regisztráció</a>
            <a href="loginPage.php" id="login" class="notActive">Bejelentkezés</a>
            <a href="loggedIn.php" id="logout" class="notActive">Kijelentkezés</a>
            <a href="changeUserInfoPage.php" id="changeinfo" class="notActive">Profil módosítása</a>
        </nav>
    </header>
    <form action="./php/registration.php" method="POST">
        <label for="email">E-mail</label>
        <br>
        <input type="email" name="email" maxlength="255">
        <br><br>

        <label for="fhnev">Felhasználónév:</label>
        <br>
        <input type="text" name="fhnev" maxlength="255" minlength="3">
        <br><br>

        <label for="veznev">Vezetéknév</label>
        <br>
        <input type="text" name="veznev" maxlength="255" minlength="2">
        <br><br>

        <label for="kernev">Keresztnév</label>
        <br>
        <input type="text" name="kernev" maxlength="255" minlength="2">
        <br><br>

        <label for="jelszo">Jelszó</label>
        <br>
        <input type="password" name="jelszo" maxlength="255" minlength="6">
        <br><br>

        <label for="jelszoIsm">Jelszó ismét</label>
        <br>
        <input type="password" name="jelszoIsm" maxlength="255" minlength="6">
        <br><br>

        <label for="szuldatum">Szuletési dátum</label>
        <br>
        <input type="date" name="szuldatum">
        <br><br>

        <label for="nem">Nem</label>
        <br>
        <ul>
            <li>
                <input type="radio" name="nem" value="ferfi">
                <label for="nem">Férfi</label>
            </li>
            <li>
                <input type="radio" name="nem" value="no">
                <label for="nem">Nő</label>
            </li>
            <li>
                <input type="radio" name="nem" value="egyeb">
                <label for="nem">Egyéb</label>
            </li>
        </ul>

        <input type="submit" value="Elküldés">
    </form>
</body>
</html>