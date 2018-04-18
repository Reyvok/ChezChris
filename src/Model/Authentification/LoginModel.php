<?php
include(__DIR__."/../../Model/Account/AccountModel.php");

function verifyInformations($data){
    $accountModel = new AccountModel();
    /* If there is an account with the given username and password, the user is log in and redirect to the home page */
    if($accountModel->verifyUsernameAndPassword($data['username'], $data['password'])[0]==1) {
        $_SESSION['username'] = $data['username'];
        header('Location: ../../index.php');
        exit();
    } else { /* else, an error is display */
        $_SESSION['errorLogin'] = "Nom d'utilisateur ou mot de passe incorrect";
    }

}
