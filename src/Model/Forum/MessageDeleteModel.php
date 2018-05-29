<?php
session_start();
include(__DIR__."/../../../app/config.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin' || !isset($_GET['topic']) || !is_numeric($_GET['topic']) || !isset($_GET['message']) || !is_numeric($_GET['message'])){
    header("Location: ./../../View/Forum/ForumView.php");
    exit();
}

$link = mysqli_connect(hostname, username, password, database);
mysqli_set_charset($link, "utf8");
$sql = "DELETE FROM message WHERE id=".intval($_GET['message']).";";
mysqli_query($link, $sql);
header("Location: ./../../View/Forum/TopicView.php?topic=".$_GET['topic']);
exit();