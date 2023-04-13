<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezett</title>
    <link rel="stylesheet" href="styles.css">

    <?php
        require "./php/session.php";
        startSession();
        checkSession();
    ?>
</head>
<body>
    <form action="./php/logout.php" method="POST">
        <input type="submit" name="kijelentkezes" value="Kijelentkezés">
        <?php
            stopSession();
        ?>
    </form>
</body>
</html>