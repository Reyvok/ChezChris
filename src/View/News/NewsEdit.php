<?php

include(__DIR__."/../head.php");
if(!isset($_GET['id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ./GoldenBookView.php");
    exit();
}
$_SESSION['page'] = "News";

include(__DIR__."/../../Model/News/NewsModel.php");
$newsModel = new NewsModel();
$news = $newsModel->getNewsById($_GET['id'])[0];

?>



<body>

<div id="page">
    <?php include(__DIR__."/../nav.php"); ?>

    <div class="grid-y align-spaced solidBorder news-add-container">

        <div><h2>Modification de news</h2></div>

        <div class="grid-y">
            <form method="post" action="">
                <input id="news-add-title-container" type="text" name="title" value="<?= $news[0]; ?>" title="title">
                <input id="news-add-text-container" type="text" name="text" value="<?= $news[1]; ?>" title="text">
                <div id="news-add-buttons-container">
                    <button type="submit">Publier</button>
                    <button type="button">Enregistrer comme brouillon</button>
                    <button type="button">Annuler</button>
                </div>
            </form>
        </div>

    </div>

    <?php
    if(isset($_POST['title']) && isset($_POST['text'])){
        $data['title'] = $_POST['title'];
        $data['text'] = $_POST['text'];
        $newsModel->editNews($_GET['id'], $data);
        header("Location: ./NewsView.php");
        exit();
    };?>

    <?php include(__DIR__."/../footer.php"); ?>
</div>

</body>


</html>