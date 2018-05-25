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

if(!isset($_SESSION['role']) && $_SESSION['role']!='admin'){
    header("Location: ./ThemesView.php?category=".$_GET['category']);
    exit();
}

?>



<body>

<div id="page">
    <?php include(__DIR__."/../nav.php"); ?>

    <main>
        <div class="grid-y callout">
            <div><h3>Créer un nouveau thème</h3></div>
            <form method="post" action="">
                <input type="text" name="title" placeholder="Title"/>
                <input type="submit" name="submit" value="Créer"/>
            </form>
        </div>
    </main>

    <?php
    if(isset($_POST['submit']) && $_POST['submit']=="Créer"){
        if(isset($_POST['title']) && $_POST['title']!="" && $_POST['title']!=null){
            $forumModel->addTheme($_GET['category'], $_POST['title']);
            header("Location: ./ThemesView.php?category=".$_GET['category']);
            exit();
        }
    }
    ?>

    <?php include(__DIR__."/../footer.php"); ?>
</div>

</body>
