<?php
/**
 * Created by Reyvok
 * Date: 10/04/2018
 */
include("..\..\app\config.php");


class NewsModel{

    private $link;

    public function __construct(){
        $this->link = mysqli_connect(hostname,username,password,database);
    }

    public function getInfo($idNews){

        $sql = "SELECT * FROM account WHERE id =".$idNews.";";
        $res = mysqli_query($this->link, $sql);
        $userData = mysqli_fetch_array($res);
        return $userData;

    }

    public function addNews(){

        $sql = "INSERT INTO news  ";
        mysqli_query($this->link, $sql);


    }

    public function updateNews($data){

        $sql = "UPDATE news SET title='".$data['title']."', txt='".$data['txt']."', status='".$data['status']."' WHERE id=".$data['id'];
        mysqli_query($this->link, $sql);

    }

    public function deleteNews($data){

        $sql = "DELETE FROM news WHERE id=".$data['id'];
        mysqli_query($this->link, $sql);

    }
}