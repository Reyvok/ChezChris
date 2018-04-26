<?php
session_start();

if(!isset($_GET['id'])){
    header("Location: ./FanfictionView.php");
    exit();
}

include(__DIR__."/../../Model/Fanfictions/FanfictionModel.php");
$fanfictionModel = new FanfictionModel();
$idUser = $fanfictionModel->getAuthor($_GET['id']);

if($_SESSION['idUser'] !== $idUser && $_SESSION['role']!='admin'){
    header("Location: ./FanfictionView.php");
    exit();
}

$path = $fanfictionModel->getPathFile($_GET['id']);
if($path!=null) unlink(__DIR__."/../../../assets/fanfictions/".$path);
$fanfictionModel->deleteFanfiction($_GET['id']);
header("Location: ./FanfictionView.php");
exit();