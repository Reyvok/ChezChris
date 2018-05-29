<?php
session_start();
include(__DIR__."/../../../app/config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin' || !isset($_GET['category']) || !is_numeric($_GET['category']) || !isset($_GET['theme']) || !is_numeric($_GET['theme'])){
    header("Location: ./../../View/Forum/ForumView.php");
    exit();
}

$link = mysqli_connect(hostname, username, password, database);
mysqli_set_charset($link, "utf8");
include(__DIR__."/ForumModel.php");
$forumModel = new ForumModel();
$topics = $forumModel->getTopics($_GET['theme']);
foreach($topics as $topic){
    $sql = "DELETE FROM message WHERE topic=".intval($topic[0]).";";
    mysqli_query($link, $sql);
}
$sql = "DELETE FROM topic WHERE theme=".intval($_GET['theme']).";";
mysqli_query($link, $sql);
$sql = "DELETE FROM theme WHERE id=".intval($_GET['theme']).";";
mysqli_query($link, $sql);
header("Location: ./../../View/Forum/ThemesView.php?category=".$_GET['category']);
exit();