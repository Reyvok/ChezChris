<?php
include_once(__DIR__."/../../../app/config.php");


class FanfictionModel{

    private $link;

    public function __construct(){
        $this->link = mysqli_connect(hostname,username,password,database);
        mysqli_set_charset($this->link, "utf8");
    }


    /**
     * Get the last published fanfiction
     * @return array|null
     */
    public function getLastFiction(){
        $sql = "SELECT f.title, f.txt, f.pathFile, a.username, f.author FROM fanfiction f 
                INNER JOIN account a ON f.author=a.id
                WHERE status=1 ORDER BY pubDate DESC LIMIT 1;";
        $res = mysqli_query($this->link, $sql);
        $fanfiction = mysqli_fetch_all($res);
        return $fanfiction;
    }


    /**
     * Get the last 2 published fanfictions
     * @return array|null
     */
    public function getLast2Fictions($id){
        $sql = "SELECT f.title, f.txt FROM fanfiction f 
                WHERE f.author=".intval($id)." and f.status=1 ORDER BY f.pubDate DESC LIMIT 2;";
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
                WHERE f.status=1 ORDER BY f.pubDate DESC;";
        $res = mysqli_query($this->link, $sql);
        $fictions = mysqli_fetch_all($res);
        return $fictions;
    }


    /**
     * Get the fictions of a user with the non published ones
     * @param $id int
     * @return array|null
     */
    public function getMyFictions($id){
        $sql = "SELECT f.title, f.txt, f.pathFile, f.pubDate, f.id, f.status FROM fanfiction f
                WHERE f.author=".intval($id)." ORDER BY f.pubDate DESC;";
        $res = mysqli_query($this->link, $sql);
        $fictions = mysqli_fetch_all($res);
        return $fictions;
    }


    /**
     * Get the fictions of a user
     * @param $id int
     * @return array|null
     */
    public function getFictionsOfUser($id){
        $sql = "SELECT f.title, f.txt, f.pathFile, f.pubDate, f.id FROM fanfiction f
                WHERE f.author=".intval($id)." and f.status=1 ORDER BY f.pubDate DESC;";
        $res = mysqli_query($this->link, $sql);
        $fictions = mysqli_fetch_all($res);
        return $fictions;
    }


    /**
     * Get a fiction
     * @param $id int
     * @return mixed
     */
    public function getFiction($id){
        $sql = "SELECT f.title, f.txt, f.pathFile FROM fanfiction f
                WHERE f.id=".intval($id).";";
        $res = mysqli_query($this->link, $sql);
        $fiction = mysqli_fetch_all($res)[0];
        return $fiction;
    }


    /**
     * Add a fanfiction
     * @param $data array
     */
    public function addFanfiction($data){
        $sql = "INSERT INTO fanfiction VALUES (null, '".mysqli_real_escape_string($this->link,$data['title'])."', 
                                                      '".mysqli_real_escape_string($this->link,$data['text'])."', 
                                                      '".mysqli_real_escape_string($this->link,$data['pathfile'])."', 1, null, current_timestamp(), 
                                                      ".intval($_SESSION['idUser']).");";
        mysqli_query($this->link, $sql);
    }


    /**
     * Add a fanfiction as a draft
     * @param $data array
     */
    public function addFanfictionToDrafts($data){
        $sql = "INSERT INTO fanfiction VALUES (null, '".mysqli_real_escape_string($this->link,$data['title'])."', 
                                                      '".mysqli_real_escape_string($this->link,$data['text'])."', 
                                                      '".mysqli_real_escape_string($this->link,$data['pathfile'])."', 2, null, current_timestamp(), 
                                                      ".intval($_SESSION['idUser']).");";
        mysqli_query($this->link, $sql);
    }


    /**
     * Delete a fanfiction
     * @param $id int
     */
    public function deleteFanfiction($id){
        $sql = "DELETE FROM fanfiction WHERE id=".intval($id).";";
        mysqli_query($this->link, $sql);
    }


    /**
     * Edit a fanfiction
     * @param $data array
     */
    public function editFanfiction($data){
        if(isset($data['pathfile'])){
            $sql = "UPDATE fanfiction SET title='".mysqli_real_escape_string($this->link,$data['title'])."', 
                                          txt='".mysqli_real_escape_string($this->link,$data['text'])."', 
                                          pathFile='".mysqli_real_escape_string($this->link,$data['pathfile'])."', 
                                          pubDate=current_timestamp(),
                                          status=1
                                          WHERE id=".intval($data['id']).";";
        }else{
            $sql = "UPDATE fanfiction SET title='".mysqli_real_escape_string($this->link,$data['title'])."', 
                                          txt='".mysqli_real_escape_string($this->link,$data['text'])."', 
                                          pubDate=current_timestamp(),
                                          status=1
                                          WHERE id=".intval($data['id']).";";
        }
        mysqli_query($this->link, $sql);
    }


    /**
     * Edit a fanfiction as a draft
     * @param $data array
     */
    public function editFanfictionToDrafts($data){
        if(isset($data['pathfile'])){
            $sql = "UPDATE fanfiction SET title='".mysqli_real_escape_string($this->link,$data['title'])."', 
                                          txt='".mysqli_real_escape_string($this->link,$data['text'])."', 
                                          pathFile='".mysqli_real_escape_string($this->link,$data['pathfile'])."', 
                                          pubDate=current_timestamp(),
                                          status=2
                                          WHERE id=".intval($data['id']).";";
        }else{
            $sql = "UPDATE fanfiction SET title='".mysqli_real_escape_string($this->link,$data['title'])."', 
                                          txt='".mysqli_real_escape_string($this->link,$data['text'])."', 
                                          pubDate=current_timestamp(),
                                          status=2
                                          WHERE id=".intval($data['id']).";";
        }
        mysqli_query($this->link, $sql);
    }


    /**
     * Get the author of a fiction
     * @param $idFiction int
     * @return int
     */
    public function getAuthor($idFiction){
        $sql = "SELECT author FROM fanfiction WHERE id=".intval($idFiction).";";
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
        $sql = "SELECT pathFile FROM fanfiction WHERE id=".intval($id).";";
        $res = mysqli_query($this->link, $sql);
        $path = mysqli_fetch_all($res)[0][0];
        return $path;
    }


}