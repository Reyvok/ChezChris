<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "News";

include(__DIR__."/../../Model/News/NewsModel.php");
$newsModel = new NewsModel();
if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
    $news = $newsModel->getAllNews();
} else {
    $news = $newsModel->getNews();
}
unset($newsModel);

?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <?php if(isset($_SESSION['role']) && $_SESSION['role']=='admin'):?><a href="/src/View/News/NewsAdd.php">Publier une news</a><?php endif;?>

            <div class="grid-y align-spaced callout">

                <?php foreach($news as $new): ?>
                        <div class="grid-y align-spaced callout small news-news-container">
                            <div class="grid-x align-justify">
                                <div><h2><?= $new[1];?></h2></div>
                                <div>
                                    <?php if(isset($_SESSION['role']) && $_SESSION['role']=='admin'):?>
                                        <a href="/src/View/News/NewsEdit.php?id=<?=$new[0];?>">Modifier</a>
                                        <a href="/src/View/News/NewsDelete.php?id=<?=$new[0];?>">Supprimer</a>
                                    <?php endif;?>
                                    <?php
                                    if($new[6]==1) echo $new[3];
                                    else echo "Brouillon";?>
                                    <a href="/src/View/Account/AccountView.php?id=<?=$new[5];?>"><?=$new[4];?></a></div>
                            </div>
                            <div class="cell auto news-message-container"><p><?= $new[2];?></p></div>
                        </div>
                <?php endforeach; ?>

            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>

