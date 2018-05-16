<?php
session_start();
include(__DIR__."/../../Model/Account/AccountModel.php");
$accountModel = new AccountModel();

if(!isset($_POST['confirm']) || $_POST['confirm'] != "Confirmer" || !isset($_SESSION['idUser']) || ($_SESSION['idUser']!=$_POST['id'] && $_SESSION['role']!="admin")){
    header("Location: ./../../index.php");
    exit();
}

if(!isset($_POST['password']) || empty($_POST['password']) || !preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/",$_POST['password']) || $accountModel->verifyUsernameAndPassword($_SESSION['username'], $_POST['password'])[0]!=1)
    $_SESSION['errorPsswd'] = "Mot de passe incorrect";

if(isset($_SESSION['errorPsswd'])){
    header("Location: ./../../View/MyAccount/MyAccountDelete.php");
    exit();
}

$link = mysqli_connect(hostname, username, password, database);
mysqli_set_charset($link, "utf8");
$sql = "DELETE FROM account WHERE id=".intval($_SESSION['idUser']).";";
mysqli_query($link, $sql);
header("Location: ./../Authentification/LogoutModel.php");
exit();