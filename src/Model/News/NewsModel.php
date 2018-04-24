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
                WHERE n.status=1 ORDER BY n.pubDate DESC;";
        $res = mysqli_query($this->link, $sql);
        $news = mysqli_fetch_all($res);
        return $news;
    }


    /**
     * Get a news by its id
     * @param $id int
     * @return array|null
     */
    public function getNewsById($id){
        $sql = "SELECT n.title, n.txt, n.pubDate, a.username FROM news n
                INNER JOIN account a ON n.author=a.id
                WHERE n.id=".$id.";";
        $res = mysqli_query($this->link, $sql);
        $news = mysqli_fetch_all($res);
        return $news;
    }


    /**
     * Add a news
     * @param $data array
     */
    public function addNews($data){
        $sql = "INSERT INTO news VALUES
                  (null, '".$data['title']."', '".$data['text']."', current_timestamp(), ".$_SESSION['idUser'].", 1);";
        mysqli_query($this->link, $sql);
    }


    /**
     * Delete a news
     * @param $id int
     */
    public function deleteNews($id){
        $sql = "DELETE FROM news WHERE id=".$id.";";
        mysqli_query($this->link, $sql);
    }


    /**
     * Edit a news
     * @param $id int
     * @param $data array
     */
    public function editNews($id, $data){
        $sql = "UPDATE news SET title='".$data['title']."', txt='".$data['text']."' WHERE id=".$id.";";
        mysqli_query($this->link, $sql);
    }
}