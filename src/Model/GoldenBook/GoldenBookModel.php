<?php
include_once(__DIR__."/../../../app/config.php");


class GoldenBookModel{

    private $link;

    public function __construct(){
        $this->link = mysqli_connect(hostname, username, password, database);
        mysqli_set_charset($this->link, "utf8");
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
                WHERE b.id=".intval($book)."
                ORDER BY o.pubDate LIMIT 2;";
        $res = mysqli_query($this->link, $sql);
        $opinions = mysqli_fetch_all($res);
        return $opinions;
    }


    /**
     * Get all of the opinions about a book
     * @param $book int
     * @return array|null
     */
    public function getOpinions($book){
        $sql = "SELECT o.title, o.txt, o.note, o.pubDate, a.username, o.id FROM opinion o
                INNER JOIN account a ON o.author=a.id
                INNER JOIN book b ON o.book=b.id
                WHERE b.id=".intval($book)."
                ORDER BY o.pubDate;";
        $res = mysqli_query($this->link, $sql);
        $opinions = mysqli_fetch_all($res);
        return $opinions;
    }


    /**
     * Get all of the books
     * @return array|null
     */
    public function getBooks(){
        $sql = "SELECT * FROM book;";
        $res = mysqli_query($this->link, $sql);
        $books = mysqli_fetch_all($res);
        return $books;
    }


    /**
     * Add an opinion about a book
     * @param $data array
     */
    public function addOpinion($data){
        $sql = "INSERT INTO opinion VALUES (null, '".mysqli_real_escape_string($this->link,$data['title'])."', 
                                                  '".mysqli_real_escape_string($this->link,$data['text'])."', 
                                                  ".intval($data['note']).", current_timestamp(), 
                                                  ".intval($_SESSION['idUser']).", 
                                                  ".intval($data['book']).");";
        mysqli_query($this->link, $sql);
    }


    /**
     * Delete an opinion
     * @param $id int
     */
    public function deleteOpinion($id){
        $sql = "DELETE FROM opinion WHERE id=".intval($id).";";
        mysqli_query($this->link, $sql);
    }


    /**
     * Add a book
     * @param $title string
     */
    public function addBook($title){
        $sql = "INSERT INTO book VALUES (null, '".mysqli_real_escape_string($this->link,$title)."', null);";
        mysqli_query($this->link, $sql);
    }
}