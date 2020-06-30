<?php 
session_start();
?>

<h2>Changer mon mot de passe</h2>
<form action="./auth.php" method="POST">
    <input type="text" name="pseudo" value="<?= $_SESSION['pseudo']?>" placeholder="Pseudo">
    <br>
    <input type="text" name="email" value="" placeholder="Email">
    <br>
    <input type="password" name="text" value="" placeholder="Ancien Mot de passe"><br>
    <input type="password" name="text" value="" placeholder="Nouveau mot de passe"><br>
    <input type="password" name="text" value="" placeholder="Confirmer le mot de passe">
    <br>
    <input type="submit" value="Changer mon mot de passe">
</form>