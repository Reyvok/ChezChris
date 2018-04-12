<?php
/**
 * Created by Reyvok
 * Date: 10/04/2018
 */

include("..\..\app\config.php");


class SuggestionModel{

    private $link;

    public function __construct(){
        $this->link = mysqli_connect(hostname,username,password,database);
    }

    public function getInfo($idSug){
        $sql = "SELECT * FROM account WHERE id =".$idSug.";";
        $res = mysqli_query($this->link, $sql);
        $userData = mysqli_fetch_array($res);
        return $userData;
    }

    public function addSuggestion($data){
        $sql = "INSERT INTO suggestion title =  '".$data['title']."', txt='".$data['txt']."', author = '".$data['author']."' WHERE id=".$data['id'];
        mysqli_query($this->link, $sql);
    }

    public function updateSuggestion($data){
        $sql = "UPDATE suggestion SET title='".$data['title']."', txt='".$data['txt']."' WHERE id=".$data['id'];
        mysqli_query($this->link, $sql);
    }

    public function deleteSuggestion($data){
        $sql = "DELETE FROM suggestion WHERE id=".$data['id'];
        mysqli_query($this->link, $sql);
    }
}