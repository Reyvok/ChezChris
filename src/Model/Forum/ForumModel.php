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
        $sql = "SELECT t.id, t.title, t.pubDate, a.username, t.author FROM topic t
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
            $return[$i] = [$topics[$i][1], $topics[$i][2], $topics[$i][3], $topics[$i][4], $messages[0][0]];
        }
        return $return;
    }


    /**
     * Get the categories
     * @return array|null
     */
    public function getCategories(){
        $sql = "SELECT * FROM category;";
        $res = mysqli_query($this->link, $sql);
        $categories = mysqli_fetch_all($res);
        return $categories;
    }


    /**
     * Get the themes of a category
     * @param $idCategory int
     * @return array|null
     */
    public function getThemes($idCategory){
        $sql = "SELECT t.id, t.title FROM theme t
                WHERE t.category=".intval($idCategory).";";
        $res = mysqli_query($this->link, $sql);
        $themes = mysqli_fetch_all($res);
        return $themes;
    }


    /**
     * Get the topics of a theme
     * @param $idTheme int
     * @return array|null
     */
    public function getTopics($idTheme){
        $sql = "SELECT t.id, t.title, t.pubDate, t.author, a.username FROM topic t
                INNER JOIN account a ON t.author=a.id
                WHERE t.theme=".intval($idTheme)."
                ORDER BY t.pubDate DESC;";
        $res = mysqli_query($this->link, $sql);
        $topics = mysqli_fetch_all($res);
        return $topics;
    }


    /**
     * Get the messages of a topic
     * @param $idTopic int
     * @return array|null
     */
    public function getMessages($idTopic){
        $sql = "SELECT m.id, m.title, m.txt, m.pubDate, m.author, a.username FROM message m
                INNER JOIN account a ON m.author=a.id
                WHERE m.topic=".intval($idTopic)."
                ORDER BY m.pubDate DESC;";
        $res = mysqli_query($this->link, $sql);
        $messages = mysqli_fetch_all($res);
        return $messages;
    }


    /**
     * Get the title of a category
     * @param $id int
     * @return array|null
     */
    public function getCategoryTitle($id){
        $sql = "SELECT title FROM category WHERE id=".intval($id).";";
        $res = mysqli_query($this->link, $sql);
        $title = mysqli_fetch_all($res)[0][0];
        return $title;
    }


    /**
     * Get the title of a theme
     * @param $id int
     * @return mixed
     */
    public function getThemeTitle($id){
        $sql = "SELECT title FROM theme WHERE id=".intval($id).";";
        $res = mysqli_query($this->link, $sql);
        $title = mysqli_fetch_all($res)[0][0];
        return $title;
    }


    /**
     * Get the title of a topic
     * @param $id int
     * @return mixed
     */
    public function getTopicTitle($id){
        $sql = "SELECT title FROM topic WHERE id=".intval($id).";";
        $res = mysqli_query($this->link, $sql);
        $title = mysqli_fetch_all($res)[0][0];
        return $title;
    }


    /**
     * Count the number of themes about a category
     * @param $id int
     * @return mixed
     */
    public function countThemesOfCategory($id){
        $sql = "SELECT count(t.id) FROM theme t
                INNER JOIN category ca ON t.category=ca.id
                WHERE ca.id=".intval($id).";";
        $res = mysqli_query($this->link, $sql);
        $count = mysqli_fetch_all($res)[0][0];
        return $count;
    }


    /**
     * Count the number of topics about a theme
     * @param $id int
     * @return mixed
     */
    public function countTopicsOfTheme($id){
        $sql = "SELECT count(t.id) FROM topic t
                INNER JOIN theme th ON t.theme=th.id
                WHERE th.id=".intval($id).";";
        $res = mysqli_query($this->link, $sql);
        $count = mysqli_fetch_all($res)[0][0];
        return $count;
    }


    /**
     * Count the number of messages about a topic
     * @param $id int
     * @return mixed
     */
    public function countMessagesOfTopic($id){
        $sql = "SELECT count(m.id) FROM message m
                INNER JOIN topic t ON m.topic=t.id
                WHERE t.id=".intval($id).";";
        $res = mysqli_query($this->link, $sql);
        $count = mysqli_fetch_all($res)[0][0];
        return $count;
    }



    /**
     * Add a category
     * @param $title string
     */
    public function addCategory($title){
        $sql = "INSERT INTO category VALUES(null, '".mysqli_real_escape_string($this->link, $title)."');";
        mysqli_query($this->link, $sql);
    }



    /**
     * Add a theme
     * @param $category int
     * @param $title string
     */
    public function addTheme($category, $title){
        $sql = "INSERT INTO theme VALUES(null, '".mysqli_real_escape_string($this->link, $title)."', ".intval($category).");";
        mysqli_query($this->link, $sql);
    }



    /**
     * Add a topic
     * @param $theme int
     * @param $title string
     * @param $author int
     */
    public function addTopic($theme, $title, $author){
        $sql = "INSERT INTO topic VALUES(null, '".mysqli_real_escape_string($this->link,$title)."', ".intval($theme).", ".intval($author).", current_timestamp());";
        mysqli_query($this->link, $sql);
    }



    /**
     * Add a message
     * @param $topic int
     * @param $data array
     */
    public function addMessage($topic, $data){
        $sql = "INSERT INTO message VALUES(null, '".mysqli_real_escape_string($this->link, $data['title'])."', '".mysqli_real_escape_string($this->link, $data['text'])."', ".intval($topic).", ".intval($data['author']).", current_timestamp());";
        mysqli_query($this->link, $sql);
    }
}