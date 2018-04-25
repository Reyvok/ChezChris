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


    /**
     * Get all of the fanfictions
     * @return array|null
     */
    public function getFictions(){
        $sql = "SELECT f.title, f.txt, f.pathFile, f.pubDate, a.username, f.author, f.id FROM fanfiction f
                INNER JOIN account a ON f.author=a.id
                WHERE status=1 ORDER BY f.pubDate DESC;";
        $res = mysqli_query($this->link, $sql);
        $fictions = mysqli_fetch_all($res);
        return $fictions;
    }


    /**
     * Add a fanfiction
     * @param $data array
     */
    public function addFanfiction($data){
        $sql = "INSERT INTO fanfiction VALUES (null, '".$data['title']."', '".$data['text']."', '".$data['pathfile']."', 1, null, current_timestamp(), ".$_SESSION['idUser'].");";
        mysqli_query($this->link, $sql);
    }


    /**
     * Delete a fanfiction
     * @param $id int
     */
    public function deleteFanfiction($id){
        $sql = "DELETE FROM fanfiction WHERE id=".$id.";";
        mysqli_query($this->link, $sql);
    }


    /**
     * Get the author of a fiction
     * @param $idFiction int
     * @return int
     */
    public function getAuthor($idFiction){
        $sql = "SELECT author FROM fanfiction WHERE id=".$idFiction.";";
        $res = mysqli_query($this->link, $sql);
        $author = mysqli_fetch_all($res)[0][0];
        return $author;
    }


    /**
     * Get the file's path of a fiction
     * @param $id int
     * @return string|null
     */
    public function getPathFile($id){
        $sql = "SELECT pathFile FROM fanfiction WHERE id=".$id.";";
        $res = mysqli_query($this->link, $sql);
        $path = mysqli_fetch_all($res)[0][0];
        return $path;
    }


}