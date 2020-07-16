<?php 
session_start();
require_once('SQL_connect.php');
if (isset($_POST['newPwd']))
{
    echo "changing password";
    var_dump($_POST);
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $oldPwd = $_POST['oldPwd'];
    $newPwd = $_POST['newPwd'];
    $ConfirmPwd = $_POST['ConfirmPwd'];

    $getUserData = $SQL->prepare ("SELECT * FROM users WHERE pseudo = :pseudo");
    $getUserData->execute(array('pseudo' => $pseudo));
    $userData = $getUserData->fetch(PDO::FETCH_ASSOC);
    print_r($userData);
    if($pseudo === $userData['pseudo'])
        {
            if($email === $userData['email'])
                {if (password_verify($oldPwd, $userData['userPassword']) == true )
                    echo "we are in the loop";
                    if ($newPwd === $ConfirmPwd)
                    {
                    $newPwd=password_hash($newPwd, PASSWORD_BCRYPT);   
                    $updatePwd =  $SQL->prepare ("UPDATE users SET userPassword = :newPwd WHERE ID = :id ");
                    $updatePwd->execute(array(
                        'newPwd' => $newPwd, 
                        'id' => $userData['ID']));    
                    }

                }
        }
}

else
{
    ?>

<h2>Changer mon mot de passe</h2>
<form action="#" method="POST">
    <input type="text" name="pseudo" value="<?= $_SESSION['pseudo']?>" placeholder="Pseudo">
    <br>
    <input type="text" name="email" value="" placeholder="Email">
    <br>
    <input type="password" name="oldPwd" value="" placeholder="Ancien Mot de passe"><br>
    <input type="password" name="newPwd" value="" placeholder="Nouveau mot de passe" required><br>
    <input type="password" name="ConfirmPwd" value="" placeholder="Confirmer le mot de passe" required>
    <br>
    <input type="submit" value="Changer mon mot de passe">
</form>
<?php 
}
?>