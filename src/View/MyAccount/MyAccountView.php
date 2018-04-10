<?php
/**
 * Created by Reyvok
 * Date: 04/04/2018
 */


include("..\Model\MyAccountModel.php");

$idUser = $_GET['idUser'];
$accountModel = new MyAccountModel();
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
echo "<a href='AccountUpdate.php?idUser=".$idUser."'>Modifier les informations</a>";
// Link to change the password
echo "<a href='passwordUpdate.php?idUSer=".$idUser."'>Modifier le mot de passe</a>"; // TODO : faire le changement de mdp


/*   Account Update
 *


include("..\Model\MyAccountModel.phphp");

$idUser = $_GET['idUser'];
$accountModel = new MyAccountModel();
$userData = $accountModel->getInformations($idUser);

session_start();

/**
 * Update form
 * If there is some errors, they are displayed under the inputs
 *
$form =
    "<form method='post' action=''>
        <input type='hidden' name='id' value='".$idUser."'/>
        <input type='text' name='username' value='".$userData['username']."'/>";
if(isset($_SESSION['errorUsername'])){ $form = $form."<div>".$_SESSION['errorUsername']."</div>"; unset($_SESSION['errorUsername']);}
$form = $form."<br><input type='text' name='firstname' value='".$userData['firstname']."'/>";
if(isset($_SESSION['errorFName'])){ $form = $form."<div>".$_SESSION['errorFName']."</div>"; unset($_SESSION['errorFName']);}
$form = $form."<br><input type='text' name='lastname' value='".$userData['lastname']."'/>";
if(isset($_SESSION['errorLName'])){ $form = $form."<div>".$_SESSION['errorLName']."</div>"; unset($_SESSION['errorLName']);}
$form = $form."<br><input type='text' name='mail' value='".$userData['mail']."'/>";
if(isset($_SESSION['errorMail'])){ $form = $form."<div>".$_SESSION['errorMail']."</div>"; unset($_SESSION['errorMail']);}
$form = $form."<br><input type='submit' name='confirm' value='Confirmer'/></form>";

echo $form;

/**
 * Send data to verification if all inputs are set
 *
if(isset($_POST['id']) and isset($_POST['username']) and isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['mail'])){
    $newData['id'] = $_POST['id'];
    $newData['username'] = $_POST['username'];
    $newData['firstname'] = $_POST['firstname'];
    $newData['lastname'] = $_POST['lastname'];
    $newData['mail'] = $_POST['mail'];
    $accountModel->verifyUpdate($newData);
}
 */