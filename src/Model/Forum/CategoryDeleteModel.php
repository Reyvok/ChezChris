<?php
session_start();
include(__DIR__."/../../../app/config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin' || !isset($_GET['category']) || !is_numeric($_GET['category'])){
    header("Location: ./../../View/Forum/ForumView.php");
    exit();
}

$link = mysqli_connect(hostname, username, password, database);
mysqli_set_charset($link, "utf8");
include(__DIR__."/ForumModel.php");
$forumModel = new ForumModel();
$themes = $forumModel->getThemes($_GET['category']);
foreach($themes as $theme) {
    $topics = $forumModel->getTopics($theme[0]);
    foreach ($topics as $topic) {
        $sql = "DELETE FROM message WHERE topic=" . intval($topic[0]) . ";";
        mysqli_query($link, $sql);
    }
    $sql = "DELETE FROM topic WHERE theme=" . intval($theme[0]) . ";";
    mysqli_query($link, $sql);
    $sql = "DELETE FROM theme WHERE id=" . intval($theme[0]) . ";";
    mysqli_query($link, $sql);
}
$sql = "DELETE FROM category WHERE id=".intval($_GET['category']).";";
mysqli_query($link, $sql);
header("Location: ./../../View/Forum/ForumView.php");
exit();