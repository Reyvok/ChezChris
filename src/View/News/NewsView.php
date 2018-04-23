<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "News";

include(__DIR__."/../../Model/News/NewsModel.php");
$newsModel = new NewsModel();
$news = $newsModel->getNews();
unset($newsModel);

?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <div style="margin-left: 20px; margin-top: 10px;"><button>Trier par</button><?php if(isset($_SESSION['role']) && $_SESSION['role']=='admin'):?><a href="/src/View/News/NewsAdd.php">Publier une news</a><?php endif;?></div>


        <div class="grid-y align-spaced solidBorder news-container">

            <?php foreach($news as $new): ?>
                    <div class='grid-y align-spaced solidBorder news-news-container'>
                        <div class='grid-x align-justify'>
                            <div class='news-title-container'><h2><?= $new[1];?></h2></div>
                            <div class='news-author-container'><?php if(isset($_SESSION['role']) && $_SESSION['role']=='admin'):?><a href="/src/View/News/NewsDelete.php?id=<?=$new[0];?>">Supprimer</a><?php endif;?><?= $new[4]." - ".$new[3];?></div>
                        </div>
                        <div class='cell auto news-message-container'><p><?= $new[2];?></p></div>
                    </div>
            <?php endforeach; ?>

        </div>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>