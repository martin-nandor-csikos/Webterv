<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>
</head>
<body>
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