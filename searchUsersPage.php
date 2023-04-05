<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felhasználó keresés</title>

    <?php
        require "./php/session.php";
        startSession();
        checkSession();
    ?>
</head>
<body>
    <form action="./php/searchUsers.php" method="GET">
        <label for="fhnev">Felhasználónév</label>
        <br>
        <input type="text" name="fhnev" maxlength="255" minlength="3">

        <input type="submit" value="Keresés">
    </form>
    
</body>
</html>