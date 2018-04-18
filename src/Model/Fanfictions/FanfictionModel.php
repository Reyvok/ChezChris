<?php
include_once(__DIR__."/../../../app/config.php");


class FanfictionModel{

    private $link;

    public function __construct(){
        $this->link = mysqli_connect(hostname,username,password,database);
    }


    /**
     * Get the last fanfiction published
     * @return array|null
     */
    public function getLastFiction(){
        $sql = "SELECT f.title, f.txt, f.pathFile, a.username FROM fanfiction f 
                INNER JOIN account a ON f.author=a.id
                WHERE status=1 ORDER BY pubDate DESC LIMIT 1;";
        $res = mysqli_query($this->link, $sql);
        $fanfiction = mysqli_fetch_all($res);
        return $fanfiction;
    }

    public function getInfo($idFanFic){
        $sql = "SELECT * FROM account WHERE id =".$idFanFic.";";
        $res = mysqli_query($this->link, $sql);
        $userData = mysqli_fetch_array($res);
        return $userData;
    }

    public function addFiction($data){
        $sql = "INSERT INTO news id = '".$data['id']."', title = '".$data['title']."', 
        txt = '".$data['id']."', pubDate = '".$data['id']."',
        author = '".$data['id']."', status = '".$data['id']."' WHERE id=".$data['id'];
        mysqli_query($this->link, $sql);
    }

    public function updateFiction($data){
        $sql = "UPDATE fanfiction SET title='".$data['title']."', txt='".$data['txt']."', status='".$data['status']."' WHERE id=".$data['id'];
        mysqli_query($this->link, $sql);
    }

    public function deleteFiction($data){
        $sql = "DELETE FROM fanfiction WHERE id=".$data['id'];
        mysqli_query($this->link, $sql);
    }
}