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


    /**
     * Get all of the fanarts
     * @return array|null
     */
    public function getFanarts(){
        $sql = "SELECT f.title, f.pathFile, f.pubDate, a.username, f.author, f.id FROM fanart f
                INNER JOIN account a ON f.author=a.id
                WHERE f.status=1 ORDER BY f.pubDate DESC;";
        $res = mysqli_query($this->link, $sql);
        $fanarts = mysqli_fetch_all($res);
        return $fanarts;
    }


    /**
     * Add a fanart
     * @param $data array
     */
    public function addFanart($data){
        $sql = "INSERT INTO fanart VALUES (null, '".$data['title']."', '".$data['pathfile']."', 1, null, current_timestamp(), ".$_SESSION['idUser'].");";
        mysqli_query($this->link, $sql);
    }


    /**
     * Delete a fanart
     * @param $id int
     */
    public function deleteFanart($id){
        $sql = "DELETE FROM fanart WHERE id=".$id.";";
        mysqli_query($this->link, $sql);
    }


    /**
     * Get the author of a fanart
     * @param $id int
     * @return int
     */
    public function getAuthor($id){
        $sql = "SELECT author FROM fanart WHERE id=".$id.";";
        $res = mysqli_query($this->link, $sql);
        $author = mysqli_fetch_all($res)[0][0];
        return $author;
    }


    /**
     * Get the file's path of a fanart
     * @param $id int
     * @return string|null
     */
    public function getPathFile($id){
        $sql = "SELECT pathFile FROM fanart WHERE id=".$id.";";
        $res = mysqli_query($this->link, $sql);
        $path = mysqli_fetch_all($res)[0][0];
        return $path;
    }

}