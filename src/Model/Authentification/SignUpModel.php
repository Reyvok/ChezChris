<?php
session_start();
include(__DIR__."/../../Model/Account/AccountModel.php");
$accountModel = new AccountModel();
$usernames = $accountModel->getUsernames();

if(!isset($_POST['registration']) || $_POST['registration'] != "Inscription"){
    header("Location: ./../../View/Authentification/LoginView.php");
    exit();
}

if(!isset($_POST['username']) || empty($_POST['username']) || !preg_match("/^[A-z0-9_. ]{2,20}/",$_POST['username'])) $_SESSION['errorUsername'] = "Nom d'utilisateur incorrect";
foreach($usernames as $username) if($_POST['username'] == $username[0] && !isset($_SESSION['errorUsername'])) $_SESSION['errorUsername'] = "Nom d'utilisateur indisponible";
if(!isset($_POST['firstname']) || empty($_POST['firstname']) || !preg_match("/^[A-z ]{0,20}/",$_POST['firstname'])) $_SESSION['errorFName'] = "Prénom incorrect";
if(!isset($_POST['lastname']) || empty($_POST['lastname']) || !preg_match("/^[A-z ]{0,20}/",$_POST['lastname'])) $_SESSION['errorLName'] = "Nom incorrect";
if(!isset($_POST['mail']) || empty($_POST['mail']) || !preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/",$_POST['mail'])) $_SESSION['errorMail'] = "Email incorrect";
if(!isset($_POST['password']) || !isset($_POST['confirmPassword']) || empty($_POST['password']) || empty($_POST['confirmPassword']) || !preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/",$_POST['password']) || !preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/",$_POST['confirmPassword'])) $_SESSION['errorPsswd'] = "Mot de passe incorrect";
if($_POST['password']!=$_POST['confirmPassword'] && !isset($_SESSION['errorPsswd'])) $_SESSION['errorPsswd'] = "Mots de passe différents";


if(isset($_SESSION['errorUsername']) || isset($_SESSION['errorFName']) || isset($_SESSION['errorLName']) || isset($_SESSION['errorPsswd']) || isset($_SESSION['errorMail'])){
    header("Location: ./../../View/Authentification/SignUpView.php");
    exit();
}

$link = mysqli_connect(hostname, username, password, database);
mysqli_set_charset($link, "utf8");
$sql = "INSERT INTO account 
        VALUES(null, '".mysqli_real_escape_string($link,$_POST['username'])."', null, 
                      '".mysqli_real_escape_string($link,$_POST['firstname'])."', 
                      '".mysqli_real_escape_string($link,$_POST['lastname'])."', 
                      '".mysqli_real_escape_string($link,$_POST['password'])."', 
                      '".mysqli_real_escape_string($link,$_POST['mail'])."', 5, 1, 2);";
mysqli_query($link, $sql);

header("Location: ./../../index.php");
exit();

