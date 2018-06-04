<?php

include(__DIR__."/../head.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ./GoldenBookView.php");
    exit();
}
$_SESSION['page'] = "News";

include(__DIR__."/../../Model/News/NewsModel.php");
$newsModel = new NewsModel();

?>

<?php
if(isset($_POST['submit']) && $_POST['submit']=="Publier") {
    if (isset($_POST['title']) && isset($_POST['text'])) {
        $data['title'] = $_POST['title'];
        $data['text'] = $_POST['text'];
        $newsModel->addNews($data);
        header("Location: ./NewsView.php");
        exit();
    }

} else if(isset($_POST['draft']) && $_POST['draft']=="Enregistrer comme brouillon"){

    if(isset($_POST['title']) && $_POST['title'] != "") $data['title'] = $_POST['title'];
    else $data['title'] = null;
    if(isset($_POST['text']) && $_POST['text'] != "") $data['text'] = $_POST['text'];
    else $data['text'] = null;
    if($data['title']==null && $data['text']==null) exit();
    $newsModel->addNewsToDrafts($data);
    header("Location: ./NewsView.php");
    exit();
}
?>

<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div class="grid-y align-spaced callout">

                <div><h2>Publier une news</h2></div>

                <div class="grid-y">
                    <form method="post" action="">
                        <input type="text" name="title" placeholder="Titre">
                        <input type="text" name="text" placeholder="News...">
                        <input type="submit" name="submit" value="Publier"/>
                        <input type="submit" name="draft" value="Enregistrer comme brouillon"/>
                    </form>
                </div>

            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>