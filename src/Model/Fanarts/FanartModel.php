<?php
include_once(__DIR__."/../../../app/config.php");


class FanartModel{

    private $link;

    public function __construct(){
        $this->link = mysqli_connect(hostname,username,password,database);
        mysqli_set_charset($this->link, "utf8");
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
     * Get the last 2 published fanarts
     * @return array|null
     */
    public function getLast2Fanarts($id){
        $sql = "SELECT f.title, f.pathFile FROM fanart f
                WHERE f.author=".intval($id)." and f.status=1 ORDER BY f.pubDate DESC LIMIT 2;";
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
     * Get the fanarts of a user
     * @param $id int
     * @return array|null
     */
    public function getFanartsOfUser($id){
        $sql = "SELECT f.title, f.pathFile, f.pubDate, f.id FROM fanart f
                WHERE f.author=".intval($id)." ORDER BY f.pubDate DESC;";
        $res = mysqli_query($this->link, $sql);
        $fanarts = mysqli_fetch_all($res);
        return $fanarts;
    }


    /**
     * Add a fanart
     * @param $data array
     */
    public function addFanart($data){
        $sql = "INSERT INTO fanart VALUES (null, '".mysqli_real_escape_string($this->link,$data['title'])."', 
                                                  '".mysqli_real_escape_string($this->link,$data['pathfile'])."', 1, null, current_timestamp(), ".intval($_SESSION['idUser']).");";
        mysqli_query($this->link, $sql);
    }


    /**
     * Delete a fanart
     * @param $id int
     */
    public function deleteFanart($id){
        $sql = "DELETE FROM fanart WHERE id=".intval($id).";";
        mysqli_query($this->link, $sql);
    }


    /**
     * Get the author of a fanart
     * @param $id int
     * @return int
     */
    public function getAuthor($idArt){
        $sql = "SELECT author FROM fanart WHERE id=".intval($idArt).";";
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
        $sql = "SELECT pathFile FROM fanart WHERE id=".intval($id).";";
        $res = mysqli_query($this->link, $sql);
        $path = mysqli_fetch_all($res)[0][0];
        return $path;
    }

}