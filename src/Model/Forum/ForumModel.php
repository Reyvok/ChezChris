<?php
include_once(__DIR__."/../../../app/config.php");


class ForumModel{

    private $link;

    public function __construct(){
        $this->link = mysqli_connect(hostname, username, password, database);
    }


    /**
     * Get the last 2 topics with their last message
     * @return array|null
     */
    public function getLast2Topics(){
        $sql = "SELECT t.title, t.pubDate, a.username, m.txt FROM topic t
                INNER JOIN account a ON t.author=a.id
                INNER JOIN message m ON t.id=m.topic
                ORDER BY t.pubDate DESC, m.pubDate DESC
                LIMIT 2;";
        $res = mysqli_query($this->link, $sql);
        $topic = mysqli_fetch_all($res);
        return $topic;
    }
}