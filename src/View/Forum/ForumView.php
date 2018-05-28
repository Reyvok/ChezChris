<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "Forum";

include(__DIR__."/../../Model/Forum/ForumModel.php");
$forumModel = new ForumModel();
$categories = $forumModel->getCategories();

?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <?php if(isset($_SESSION['role']) && $_SESSION['role']=='admin'): ?>
            <div><a href="/src/View/Forum/CategoryAdd.php">Créer une nouvelle catégorie</a></div>
            <?php endif; ?>
            <div class="grid-y align-spaced callout">
                <?php foreach($categories as $category): ?>
                    <div class="callout small">
                        <div class="grid-x align-justify">
                            <div><a href="/src/View/Forum/ThemesView.php?category=<?=$category[0];?>"><h3><?=$category[1];?></h3></a></div>
                            <div><?=$forumModel->countThemesOfCategory($category[0]);?> thème(s)</div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>