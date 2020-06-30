<?php
session_start();
if (isset($_SESSION['pseudo']))
{
echo "Bienvenue " .$_SESSION['pseudo'];
?>
<div>
    <a href="change.php">Modifier mon mot de passe</a>
</div>
<?php
}
else {
?>
<h2>Login</h2>
<form action="./auth.php" method="POST">
    <input type="text" name="pseudo" value="" placeholder="Pseudo">
    <br>
    <input type="password" name="password" value="" placeholder="password">
    <br>
    <input type="submit" value="Envoyer">
</form>
<p><a href="./auth.php">Créer mon compte</a></p>
<?php
}
