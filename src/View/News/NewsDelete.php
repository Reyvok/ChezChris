<?php
session_start();
if(!isset($_GET['id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ./NewsView.php");
    exit();
}

include(__DIR__."/../../Model/News/NewsModel.php");
$newsModel = new NewsModel();

$newsModel->deleteNews($_GET['id']);
header("Location: ./NewsView.php");
exit();