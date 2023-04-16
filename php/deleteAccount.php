<?php
$id = $_SESSION['id'];
$fhnev = $_SESSION['fhnev'];

//Több tábla esetén bővítés
$setForeignKey0 = "SET FOREIGN_KEY_CHECKS=0";
$deleteUserProfile = "DELETE FROM userprofile WHERE userId='$id'";
$deleteUsers = "DELETE FROM users WHERE id='$id'";
$deletePrivate_messages = "DELETE FROM private_messages WHERE sentTo='$fhnev' OR sentFrom='$fhnev'";
$setForeignKey1 = "SET FOREIGN_KEY_CHECKS=1";

if ($csatlakozas->query($setForeignKey0) === TRUE && $csatlakozas->query($deleteUsers) === TRUE && $csatlakozas->query($deletePrivate_messages) === TRUE && $csatlakozas->query($deleteUserProfile) === TRUE &&  $csatlakozas->query($setForeignKey1) === TRUE) {
    stopSession();
    header("Location: ./../loginPage.php");
} else {
    echo "Hiba.";
}
?>