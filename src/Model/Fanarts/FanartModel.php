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
        $sql = "SELECT f.title, f.pathFile, f.pubDate, a.username FROM fanart f
                INNER JOIN account a ON f.author=a.id
                WHERE f.status=1 ORDER BY f.pubDate DESC;";
        $res = mysqli_query($this->link, $sql);
        $fanarts = mysqli_fetch_all($res);
        return $fanarts;
    }

}