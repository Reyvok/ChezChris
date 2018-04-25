<?php
session_start();

if(!isset($_GET['id'])){
    header("Location: ./FanartView.php");
    exit();
}

include(__DIR__."/../../Model/Fanarts/FanartModel.php");
$fanartModel = new FanartModel();
$idUser = $fanartModel->getAuthor($_GET['id']);

if($_SESSION['idUser'] !== $idUser && $_SESSION['role']!='admin'){
    header("Location: ./FanartView.php");
    exit();
}

$path = $fanartModel->getPathFile($_GET['id']);
unlink(__DIR__."/../../../assets/fanarts/".$path);
$fanartModel->deleteFanart($_GET['id']);
header("Location: ./FanartView.php");
exit();