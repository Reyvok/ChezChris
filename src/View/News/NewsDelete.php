<?php
if(!isset($_GET['id'])) header("Location: ./NewsView.php");

include(__DIR__."/../../Model/News/NewsModel.php");
$newsModel = new NewsModel();

$newsModel->deleteNews($_GET['id']);
header("Location: ./NewsView.php");
exit();