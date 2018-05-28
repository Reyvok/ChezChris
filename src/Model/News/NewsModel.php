<?php
include_once(__DIR__."/../../../app/config.php");


class NewsModel{

    private $link;

    public function __construct(){
        $this->link = mysqli_connect(hostname,username,password,database);
        mysqli_set_charset($this->link, "utf8");
    }


    /**
     * Get the last 3 published news
     * @return array|null
     */
    public function getLast3News(){
        $sql = "SELECT n.title, n.txt, n.pubDate, a.username, n.author FROM news n 
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
        $sql = "SELECT n.id, n.title, n.txt, n.pubDate, a.username, n.author, n.status FROM news n
                INNER JOIN account a ON n.author=a.id
                WHERE n.status=1 ORDER BY n.pubDate DESC;";
        $res = mysqli_query($this->link, $sql);
        $news = mysqli_fetch_all($res);
        return $news;
    }


    /**
     * Get all news
     * @return array|null
     */
    public function getAllNews(){
        $sql = "SELECT n.id, n.title, n.txt, n.pubDate, a.username, n.author, n.status FROM news n
                INNER JOIN account a ON n.author=a.id
                ORDER BY n.pubDate DESC;";
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
                WHERE n.id=".intval($id).";";
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
                  (null, '".mysqli_real_escape_string($this->link,$data['title'])."', '".mysqli_real_escape_string($this->link,$data['text'])."', current_timestamp(), ".intval($_SESSION['idUser']).", 1);";
        mysqli_query($this->link, $sql);
    }


    /**
     * Add a news as a draft
     * @param $data array
     */
    public function addNewsToDrafts($data){
        $sql = "INSERT INTO news VALUES
                  (null, '".mysqli_real_escape_string($this->link,$data['title'])."', '".mysqli_real_escape_string($this->link,$data['text'])."', current_timestamp(), ".intval($_SESSION['idUser']).", 2);";
        mysqli_query($this->link, $sql);
    }


    /**
     * Delete a news
     * @param $id int
     */
    public function deleteNews($id){
        $sql = "DELETE FROM news WHERE id=".intval($id).";";
        mysqli_query($this->link, $sql);
    }


    /**
     * Edit a news
     * @param $id int
     * @param $data array
     */
    public function editNews($id, $data){
        $sql = "UPDATE news SET title='".mysqli_real_escape_string($this->link,$data['title'])."',
                                txt='".mysqli_real_escape_string($this->link,$data['text'])."',
                                pubDate=current_timestamp(),
                                status=1
                                WHERE id=".intval($id).";";
        mysqli_query($this->link, $sql);
    }


    /**
     * Edit a news as a draft
     * @param $id int
     * @param $data array
     */
    public function editNewsToDrafts($id, $data){
        $sql = "UPDATE news SET title='".mysqli_real_escape_string($this->link,$data['title'])."', 
                                txt='".mysqli_real_escape_string($this->link,$data['text'])."',
                                pubDate=current_timestamp(),
                                status=2
                                WHERE id=".intval($id).";";
        mysqli_query($this->link, $sql);
    }
}