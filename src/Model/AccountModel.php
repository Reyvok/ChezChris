<?php
/**
 * Created by Reyvok
 * Date: 04/04/2018
 */

namespace Model;

include("..\..\app\config.php");

class AccountModel{
    private $link;

    public function _construct(){
        $this->link = mysqli_connect(hostname,username,password,database);
    }

    public function getAccountInformations($idUser){
        $sql = "SELECT * FROM account WHERE id =".$idUser.";";
        $res = mysqli_query($this->link, $sql);
        $userData = mysqli_fetch_array($res);
        return $userData;
    }
}