<?php
include(__DIR__."/../../Model/Suggestion/SuggestionModel.php");
$suggestionModel = new SuggestionModel();

if(isset($_GET['id'])){
    $suggestionModel->deleteSuggestion($_GET['id']);
    header("Location: ./SuggestionView.php");
    exit();
}