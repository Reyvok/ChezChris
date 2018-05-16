<?php
include_once(__DIR__."/../../../app/config.php");


class ForumModel{

    private $link;

    public function __construct(){
        $this->link = mysqli_connect(hostname, username, password, database);
        mysqli_set_charset($this->link, "utf8");
    }


    /**
     * Get the last 2 topics with their last message
     * @return array|null
     */
    public function getLast2Topics(){
        $sql = "SELECT t.id, t.title, t.pubDate, a.username FROM topic t
                INNER JOIN account a ON t.author=a.id
                ORDER BY t.pubDate DESC
                LIMIT 2;";
        $res = mysqli_query($this->link, $sql);
        $topics = mysqli_fetch_all($res);
        $return = [[],[]];

        for($i=0; $i<2; $i++){
            $sql = "SELECT m.txt FROM message m
                    WHERE m.topic=".intval($topics[$i][0])."
                    ORDER BY m.pubDate DESC
                    LIMIT 1;";
            $res = mysqli_query($this->link, $sql);
            $messages = mysqli_fetch_all($res);
            $return[$i] = [$topics[$i][1], $topics[$i][2], $topics[$i][3], $messages[0][0]];
        }
        return $return;
    }
}