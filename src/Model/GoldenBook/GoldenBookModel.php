<?php
include_once("D:/Stage/ChezChris/app/config.php");


class GoldenBookModel{

    private $link;

    public function __construct(){
        $this->link = mysqli_connect(hostname, username, password, database);
    }


    /**
     * Get the last 2 opinions of a book
     * @param $book int
     * @return array|null
     */
    public function getLast2Opinions($book){
        $sql = "SELECT o.title, o.txt, o.note, o.pubDate, a.username FROM opinion o
                INNER JOIN account a ON o.author=a.id
                INNER JOIN book b ON o.book=b.id
                WHERE b.id=".$book."
                ORDER BY o.pubDate LIMIT 2;";
        $res = mysqli_query($this->link, $sql);
        $opinions = mysqli_fetch_all($res);
        return $opinions;
    }
}