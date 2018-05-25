<?php

include(__DIR__."/../../Model/Forum/ForumModel.php");
$forumModel = new ForumModel();

include(__DIR__."/../head.php");
$_SESSION['page'] = 'Forum';

if(!isset($_SESSION['role']) || $_SESSION['role']!='admin'){
    header("Location: ./ThemesView.php?category=".$_GET['category']);
    exit();
}

?>



<body>

<div id="page">
    <?php include(__DIR__."/../nav.php"); ?>

    <main>
        <div class="grid-y callout">
            <div><h3>Créer une nouvelle catégorie</h3></div>
            <form method="post" action="">
                <input type="text" name="title" placeholder="Title"/>
                <input type="submit" name="submit" value="Créer"/>
            </form>
        </div>
    </main>

    <?php
    if(isset($_POST['submit']) && $_POST['submit']=="Créer"){
        if(isset($_POST['title']) && $_POST['title']!="" && $_POST['title']!=null){
            $forumModel->addCategory($_POST['title']);
            header("Location: ./ForumView.php");
            exit();
        }
    }
    ?>

    <?php include(__DIR__."/../footer.php"); ?>
</div>

</body>
