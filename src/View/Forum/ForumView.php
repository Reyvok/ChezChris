<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "Forum";

include(__DIR__."/../../Model/Forum/ForumModel.php");
$forumModel = new ForumModel();
$categories = $forumModel->getCategories();
unset($forumModel);
?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div class="grid-y align-spaced callout">
                <?php foreach($categories as $category): ?>
                    <div class="callout small">
                        <div class="grid-x align-justify">
                            <div><a href="/src/View/Forum/ThemesView.php?category=<?=$category[0];?>"><h3><?=$category[1];?></h3></a></div>
                            <div>Thèmes</div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!--
                <div class="grid-y align-spaced solidBorder forum-category-container">
                    <div class="grid-x align-justify">
                        <div class="grid-x">
                            <div><button>-</button></div><div><h2>Catégorie 1</h2></div>
                        </div>
                        <div>Topics</div>
                    </div>
                    <div class="grid-x align-justify forum-category-theme-container">
                        <div><h3>Thème 1</h3></div><div>2</div>
                    </div>
                    <div class="grid-x align-justify forum-category-theme-container">
                        <div><h3>Thème 2</h3></div><div>4</div>
                    </div>
                    <div class="grid-x align-justify forum-category-theme-container">
                        <div><h3>Thème 3</h3></div><div>1</div>
                    </div>
                </div>

                <div class="grid-y align-spaced solidBorder forum-category-container">
                    <div class="grid-x">
                        <div><button>+</button></div><div><h2>Catégorie 2</h2></div>
                    </div>
                </div>
                -->

            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>