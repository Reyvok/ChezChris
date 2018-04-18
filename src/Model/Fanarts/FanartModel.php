<?php
include_once(__DIR__."/../../../app/config.php");


class FanartModel{

    private $link;

    public function __construct(){
        $this->link = mysqli_connect(hostname,username,password,database);
    }


    /**
     * Get the last published fanart
     * @return array|null
     */
    public function getLastFanart(){
        $sql = "SELECT f.title, f.pathFile, a.username FROM fanart f
                INNER JOIN account a ON f.author=a.id
                WHERE f.status=1 ORDER BY f.pubDate DESC LIMIT 1;";
        $res = mysqli_query($this->link, $sql);
        $fanart = mysqli_fetch_all($res);
        return $fanart;
    }

    public function getInfo($idFanArt){
        $sql = "SELECT * FROM account WHERE id =".$idFanArt.";";
        $res = mysqli_query($this->link, $sql);
        $userData = mysqli_fetch_array($res);
        return $userData;
    }

    public function addFanArt($data){
        $sql = "INSERT INTO fanart id = '".$data['id']."', title = '".$data['title']."', 
        pathFile = '".$data['id']."', status = '".$data['id']."', 
        note = '".$data['id']."', pubDate = '".$data['id']."', author = '".$data['id']."' WHERE id=".$data['id'];
        mysqli_query($this->link, $sql);
    }

    public function updateFanArt($data){
        $sql = "UPDATE fanart SET title='".$data['title']."', txt='".$data['txt']."', status='".$data['status']."' WHERE id=".$data['id'];
        mysqli_query($this->link, $sql);
    }

    public function deleteFanArt($data){
        $sql = "DELETE FROM fanart WHERE id=".$data['id'];
        mysqli_query($this->link, $sql);
    }

}