<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
</head>
<body>
    <form action="./php/login.php" method="POST">
        <label for="fhnev">Felhasználónév:</label>
        <br>
        <input type="text" name="fhnev" maxlength="255" minlength="2" required>
        <br><br>

        <label for="jelszo">Jelszó:</label>
        <br>
        <input type="password" name="jelszo" maxlength="255" minlength="6" required>

        <input type="submit" name="bejelentkezes" value="Bejelentkezés">
    </form>
    
</body>
</html>