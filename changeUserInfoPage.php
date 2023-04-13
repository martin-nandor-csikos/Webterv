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
    <form action="./php/changeUserInfo.php" method="POST">
        <label for="ujEmail">Új e-mail</label>
        <br>
        <input type="email" name="ujEmail" maxlength="255">
        <br><br>

        <label for="ujFhnev">Új felhasználónév:</label>
        <br>
        <input type="text" name="ujFhnev" maxlength="255" minlength="3">
        <br><br>

        <label for="ujVeznev">Új vezetéknév</label>
        <br>
        <input type="text" name="ujVeznev" maxlength="255" minlength="2">
        <br><br>

        <label for="ujKernev">Új keresztnév</label>
        <br>
        <input type="text" name="ujKernev" maxlength="255" minlength="2">
        <br><br>

        <label for="ujJelszo">Új jelszó</label>
        <br>
        <input type="password" name="ujJelszo" maxlength="255" minlength="6">
        <br><br>

        <label for="ujJelszoIsm">Új jelszó ismét</label>
        <br>
        <input type="password" name="ujJelszoIsm" maxlength="255" minlength="6">
        <br><br>

        <label for="ujSzuldatum">Új szuletési dátum</label>
        <br>
        <input type="date" name="ujSzuldatum">
        <br><br>

        <label for="ujNem">Új nem</label>
        <br>
        <ul>
            <li>
                <input type="radio" name="ujNem" value="ferfi">
                <label for="ujNem">Férfi</label>
            </li>
            <li>
                <input type="radio" name="ujNem" value="no">
                <label for="ujNem">Nő</label>
            </li>
            <li>
                <input type="radio" name="ujNem" value="egyeb">
                <label for="ujNem">Egyéb</label>
            </li>
        </ul>

        <input type="submit" value="Elküldés">
    </form>
</body>
</html>