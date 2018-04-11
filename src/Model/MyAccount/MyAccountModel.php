<?php
/**
 * Created by Reyvok
 * Date: 04/04/2018
 */

include("..\..\app\config.php");

class MyAccountModel{
    private $link;

    public function __construct(){
        $this->link = mysqli_connect(hostname,username,password,database);
    }


    /**
     * Get the informations of a user
     * @param $idUser int
     * @return array|null
     */
    public function getInformations($idUser){
        $sql = "SELECT * FROM account WHERE id =".$idUser.";";
        $res = mysqli_query($this->link, $sql);
        $userData = mysqli_fetch_array($res);
        return $userData;
    }


    /**
     * Update an account
     * @param $data array of data
     */
    public function update($data){
        $sql = "UPDATE account SET username='".$data['username']."', firstname='".$data['firstname']."', lastname='".$data['lastname']."', mail='".$data['mail']."' WHERE id=".$data['id'];
        mysqli_query($this->link, $sql);
    }


    /**
     * Get all usernames in the base
     * @return array|null
     */
    public function getUsernames(){
        $sql = "SELECT username FROM account;";
        $res = mysqli_query($this->link, $sql);
        $usernames = mysqli_fetch_array($res);
        return $usernames;
    }

    //////// check mdp preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $password)


    /**
     * Verify if there is no error before updating an account
     * @param $data array of data
     */
    public function verifyUpdate($data){
        $usernames = $this->getUsernames();
        if((!preg_match("/^[A-z0-9_ ]{3,20}/",$data['username']))){
            $_SESSION['errorUsername'] = "Nom d'utilisateur incorrect\n";
        }else{
            foreach($usernames as $username){
                if($data['username']==$username and !isset($_SESSION['errorUsername'])) $_SESSION['errorUsername'] = "Nom d\'utilisateur indisponible\n";
            }
        }

        if((!preg_match("/^[A-z ]{0,20}/",$data['firstname']))) $_SESSION['errorFName'] = "Prénom incorrect\n";
        if((!preg_match("/^[A-z ]{0,20}/",$data['lastname']))) $_SESSION['errorLName'] = "Nom incorrect\n";
        if((!preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/",$data['mail']))) $_SESSION['errorMail'] = "Adresse email incorrecte";

        if(!isset($_SESSION['errorUsername']) and !isset($_SESSION['errorFName']) and !isset($_SESSION['errorLName']) and !isset($_SESSION['errorMail'])){
            $this->update($data);
            header('Location: ..\View\accountView.php?idUser='.$data['id']);
        }else{
            header('Location: ..\View\accountUpdate.php?idUser='.$data['id']);
        }
    }
}