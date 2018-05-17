<?php
include_once(__DIR__."/../../../app/config.php");


class SuggestionModel{

    private $link;

    public function __construct(){
        $this->link = mysqli_connect(hostname,username,password,database);
        mysqli_set_charset($this->link, "utf8");
    }


    /**
     * Get all of the suggestions
     * @return array|null
     */
    public function getSuggestions(){
        $sql = "SELECT s.id, s.title, s.txt, s.pubDate, a.username, s.author FROM suggestion s
                INNER JOIN account a ON s.author=a.id
                ORDER BY s.pubDate;";
        $res = mysqli_query($this->link, $sql);
        $suggestions = mysqli_fetch_all($res);
        return $suggestions;
    }


    /**
     * Add a suggestion
     * @param $data array
     */
    public function addSuggestion($data){
        $sql = "INSERT INTO suggestion VALUES
                  (null, '".mysqli_real_escape_string($this->link,$data['title'])."', '".mysqli_real_escape_string($this->link,$data['suggestion'])."', current_timestamp(), ".intval($_SESSION['idUser']).");";
        mysqli_query($this->link, $sql);
    }


    /**
     * Delete a suggestion
     * @param $id int
     */
    public function deleteSuggestion($id){
        $sql = "DELETE FROM suggestion WHERE id=".intval($id).";";
        mysqli_query($this->link, $sql);
    }
}