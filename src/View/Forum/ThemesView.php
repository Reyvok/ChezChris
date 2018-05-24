<?php
if(!isset($_GET['category']) || !is_numeric($_GET['category'])){
    header("Location: ./ForumView.php");
    exit();
}

include(__DIR__."/../../Model/Forum/ForumModel.php");
$forumModel = new ForumModel();
$category = $forumModel->getCategoryTitle($_GET['category']);

include(__DIR__."/../head.php");
$_SESSION['page'] = $category;

$themes = $forumModel->getThemes($_GET['category']);

?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div class="grid-y callout">
                <?php foreach($themes as $theme): ?>
                    <div class="callout small">
                        <div class="grid-x align-justify">
                            <div><a href="/src/View/Forum/TopicsView.php?theme=<?=$theme[0];?>"><h3><?=$theme[1];?></h3></a></div>
                            <div><?=$forumModel->countTopicsOfTheme($theme[0]);?> topic(s)</div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>