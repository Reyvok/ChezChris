<?php
include_once(__DIR__."/../../../app/config.php");


class NewsModel{

    private $link;

    public function __construct(){
        $this->link = mysqli_connect(hostname,username,password,database);
    }


    /**
     * Get the last 3 published news
     * @return array|null
     */
    public function getLast3News(){
        $sql = "SELECT n.title, n.txt, n.pubDate, a.username FROM news n 
                INNER JOIN account a ON n.author=a.id
                WHERE status=1 ORDER BY pubDate DESC LIMIT 3;";
        $res = mysqli_query($this->link, $sql);
        $news = mysqli_fetch_all($res);
        return $news;
    }


    public function getInfo($idNews){
        $sql = "SELECT * FROM account WHERE id =".$idNews.";";
        $res = mysqli_query($this->link, $sql);
        $userData = mysqli_fetch_array($res);
        return $userData;
    }

    public function addNews($data){
        $sql = "INSERT INTO news  title = '".$data['title']."', txt = '".$data['txt']."', status = '".$data['status']."' ";
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