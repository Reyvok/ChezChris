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

if(!isset($_SESSION['idUser']) || !is_numeric($_SESSION['idUser'])){
    header("Location: ./../Authentification/LoginView.php");
    exit();
}

?>



<body>

<div id="page">
    <?php include(__DIR__."/../nav.php"); ?>

    <main>
        <div class="grid-y callout">
            <div><h3>Créer un nouveau topic</h3></div>
            <form method="post" action="">
                <input type="text" name="title" placeholder="Title"/>
                <input type="submit" name="submit" value="Créer"/>
            </form>
        </div>
    </main>

    <?php
    if(isset($_POST['submit']) && $_POST['submit']=="Créer"){
        if(isset($_POST['title']) && $_POST['title']!="" && $_POST['title']!=null){
            $forumModel->addTopic($_GET['theme'], $_POST['title'], $_SESSION['idUser']);
            header("Location: ./TopicsView.php?theme=".$_GET['theme']);
            exit();
        }
    }
    ?>

    <?php include(__DIR__."/../footer.php"); ?>
</div>

</body>
