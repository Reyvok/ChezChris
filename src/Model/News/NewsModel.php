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


    /**
     * Get all published news
     * @return array|null
     */
    public function getNews(){
        $sql = "SELECT n.id, n.title, n.txt, n.pubDate, a.username FROM news n
                INNER JOIN account a ON n.author=a.id
                WHERE n.status=1;";
        $res = mysqli_query($this->link, $sql);
        $news = mysqli_fetch_all($res);
        return $news;
    }
}