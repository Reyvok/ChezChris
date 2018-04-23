<?php
include(__DIR__."/../../Model/News/NewsModel.php");
$newsModel = new NewsModel();

if(isset($_GET['id'])){
    $newsModel->deleteNews($_GET['id']);
    header("Location: ./NewsView.php");
    exit();
}