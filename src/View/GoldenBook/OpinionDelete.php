<?php
if(!isset($_GET['id'])) header("Location: ./GoldenBookView.php");

include(__DIR__."/../../Model/GoldenBook/GoldenBookModel.php");
$goldenBookModel = new GoldenBookModel();

$goldenBookModel->deleteOpinion($_GET['id']);
header("Location: ./GoldenBookView.php");
exit();