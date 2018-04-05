<?php
/**
 * Created by Reyvok
 * Date: 04/04/2018
 */


include("..\Model\AccountModel.php");

$idUser = $_GET['idUser'];
$accountModel = new AccountModel();
$userData = $accountModel->getInformations($idUser);

/**
 * Table with informations about the user
 */
$table = "<table><tr><td>Username: </td><td>".$userData['username']."</td></tr>
                <tr><td>First name: </td><td>".$userData['firstname']."</td></tr>
                <tr><td>Last name: </td><td>".$userData['lastname']."</td></tr>
                <tr><td>Mail: </td><td>".$userData['mail']."</td></tr>
                <tr><td>Score: </td><td>".$userData['score']."</td></tr>
                <tr><td>Grade: </td><td>".$userData['grade']."</td></tr></table>";

echo $table;

// Link to change the informations
echo "<a href='accountUpdate.php?idUser=".$idUser."'>Modifier les informations</a>";
// Link to change the password
echo "<a href='passwordUpdate.php?idUSer=".$idUser."'>Modifier le mot de passe</a>"; // TODO : faire le changement de mdp