<?php
if(!isset($_GET['theme']) || !is_numeric($_GET['theme'])){
    header("Location: ./ForumView.php");
    exit();
}

include(__DIR__."/../../Model/Forum/ForumModel.php");
$forumModel = new ForumModel();
$theme = $forumModel->getThemeTitle($_GET['theme']);

include(__DIR__."/../head.php");
$_SESSION['page'] = $theme;

$topics = $forumModel->getTopics($_GET['theme']);

?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div><a href="/src/View/Forum/TopicAdd.php?theme=<?=$_GET['theme'];?>">Créer un nouveau topic</a></div>
            <div class="grid-y callout">
                <?php foreach($topics as $topic): ?>
                    <div class="callout small">
                        <div class="grid-x align-justify">
                            <div class="grid-x">
                                <div><a href="/src/View/Forum/TopicView.php?topic=<?=$topic[0];?>"><h3><?=$topic[1];?></h3></a></div>
                                <?php if(isset($_SESSION['role']) && $_SESSION['role']=='admin'): ?>
                                <div><a href="/src/Model/Forum/TopicDeleteModel.php?theme=<?=$_GET['theme'];?>&topic=<?=$topic[0];?>">Supprimer</a></div>
                                <?php endif; ?>
                            </div>
                            <div class="grid-y">
                                <div><?=$forumModel->countMessagesOfTopic($topic[0]);?> message(s)</div>
                                <div>Créé par <?=$topic[4];?></div>
                                <div>le <?=explode(" ", $topic[2])[0];?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>
