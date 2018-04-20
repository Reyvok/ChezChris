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
        $sql = "SELECT f.title, f.txt, f.pathFile, f.pubDate, a.username FROM fanfiction f
                INNER JOIN account a ON f.author=a.id
                WHERE status=1 ORDER BY f.pubDate DESC;";
        $res = mysqli_query($this->link, $sql);
        $fictions = mysqli_fetch_all($res);
        return $fictions;
    }


}