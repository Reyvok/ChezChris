<?php
include(__DIR__."/../../../app/config.php");

class AccountModel{
    private $link;

    public function __construct(){
        $this->link = mysqli_connect(hostname,username,password,database);
    }


    /**
     * Get the informations of a user by id
     * @param $idUser int
     * @return array|null
     */
    public function getInformationsById($idUser){
        $sql = "SELECT a.username, a.imagePath, a.firstname, a.lastname, a.password, a.mail, a.score, g.label FROM account a
                INNER JOIN grade g ON a.grade=g.id
                WHERE id =".$idUser.";";
        $res = mysqli_query($this->link, $sql);
        $userData = mysqli_fetch_array($res);
        return $userData;
    }


    /**
     * Get the informations of a user by username
     * @param $username string
     * @return array|null
     */
    public function getInformationsByUsername($username){
        $sql = "SELECT a.id, a.imagePath, a.firstname, a.lastname, a.password, a.mail, a.score, g.label FROM account a
                INNER JOIN grade g ON a.grade=g.id
                WHERE username='".$username."';";
        $res = mysqli_query($this->link, $sql);
        $userData = mysqli_fetch_all($res);
        return $userData;
    }


    /**
     * Get the image of a user
     * @param $username string
     * @return array|null
     */
    public function getImage($username){
        $sql = "SELECT imagePath FROM account WHERE username='".$username."';";
        $res = mysqli_query($this->link, $sql);
        $img = mysqli_fetch_all($res);
        return $img;
    }


    /**
     * Get the role of a user
     * @param $username string
     * @return array|null
     */
    public function getRole($username){
        $sql = "SELECT r.label FROM role r
                INNER JOIN account a ON a.role=r.id
                WHERE a.username = '".$username."';";
        $res = mysqli_query($this->link, $sql);
        $role = mysqli_fetch_all($res);
        return $role;
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
     * Get the id of a user
     * @param $username string
     * @return array|null
     */
    public function getId($username){
        $sql = "SELECT id FROM account WHERE username='".$username."';";
        $res = mysqli_query($this->link, $sql);
        $id = mysqli_fetch_all($res);
        return $id;
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


    /**
     * Verify if there is an account with the given username and password
     * @param $username string
     * @param $password string
     * @return array|null
     */
    public function verifyUsernameAndPassword($username, $password){
        $sql = "SELECT count(*) FROM account WHERE username='".mysqli_real_escape_string($this->link,$username)."' and password='".mysqli_real_escape_string($this->link,$password)."';";
        $res = mysqli_query($this->link, $sql);
        $data = mysqli_fetch_array($res);
        return $data;
    }

    //////// check mdp preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $password)


    /*
     * Verify if there is no error before updating an account
     * @param $data array of data
     *
    public function verifyUpdate($data){
        $usernames = $this->getUsernames();
        if((!preg_match("/^[A-z0-9_ ]{3,20}/",$data['username']))){
            $_SESSION['errorUsername'] = "Nom d'utilisateur incorrect\n";
        } else {
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
        } else {
            header('Location: ..\View\accountUpdate.php?idUser='.$data['id']);
        }
    }*/
}