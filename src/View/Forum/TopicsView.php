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

unset($forumModel);
?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div class="grid-y callout">
                <?php foreach($topics as $topic): ?>
                    <div class="callout small">
                        <div class="grid-x align-justify">
                            <div><a href="/src/View/Forum/TopicView.php?topic=<?=$topic[0];?>"><h3><?=$topic[1];?></h3></a></div>
                            <div>Messages</div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>
