<?php
session_start();
include(__DIR__."/../../../app/config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin' || !isset($_GET['theme']) || !is_numeric($_GET['theme']) || !isset($_GET['topic']) || !is_numeric($_GET['topic'])){
    header("Location: ./../../View/Forum/ForumView.php");
    exit();
}

$link = mysqli_connect(hostname, username, password, database);
mysqli_set_charset($link, "utf8");
$sql = "DELETE FROM message WHERE topic=".intval($_GET['topic']).";";
mysqli_query($link, $sql);
$sql = "DELETE FROM topic WHERE id=".intval($_GET['topic']).";";
mysqli_query($link, $sql);
header("Location: ./../../View/Forum/TopicsView.php?theme=".$_GET['theme']);
exit();