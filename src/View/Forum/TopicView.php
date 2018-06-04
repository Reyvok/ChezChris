<?php
if(!isset($_GET['topic']) || !is_numeric($_GET['topic'])){
    header("Location: ./ForumView.php");
    exit();
}

include(__DIR__."/../../Model/Forum/ForumModel.php");
$forumModel = new ForumModel();
$topic = $forumModel->getTopicTitle($_GET['topic']);

include(__DIR__."/../head.php");
$_SESSION['page'] = $topic;

$messages = $forumModel->getMessages($_GET['topic']);

?>

<?php
if(isset($_POST['submit']) && $_POST['submit']=="Publier"){
    if(!isset($_SESSION['idUser']) || !is_numeric($_SESSION['idUser'])){
        header("Location: ./../Authentification/LoginView.php");
        exit();
    }
    if(isset($_POST['title']) && $_POST['title'] != null && $_POST['title'] != "" && isset($_POST['text']) && $_POST['text'] != null && $_POST['text'] != ""){
        $data['title'] = $_POST['title'];
        $data['text'] = $_POST['text'];
        $data['author'] = $_SESSION['idUser'];
        $forumModel->addMessage($_GET['topic'], $data);
        header("Refresh:0");
        exit();
    }
}
?>

<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div class="grid-y callout">
                <?php foreach($messages as $message): ?>
                    <div class="grid-x align-justify callout small">
                        <div class="grid-y" style="max-width: 80%;">
                            <div class="grid-x">
                                <div><h4><?=$message[1];?></h4></div>
                                <?php if(isset($_SESSION['role']) && $_SESSION['role']=='admin'): ?>
                                <div><a href="/src/Model/Forum/MessageDeleteModel.php?topic=<?=$_GET['topic'];?>&message=<?=$message[0];?>">Supprimer</a></div>
                                <?php endif; ?>
                            </div>
                            <div><?=$message[2];?></div>
                        </div>
                        <div class="grid-y">
                            <div><?=$message[5];?></div>
                            <div><?=explode(" ", $message[3])[0];?></div>
                            <div><?=explode(" ", $message[3])[1];?></div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="callout">
                    <form method="post" action="">
                        <h3>Ajouter un message</h3>
                        <input type="text" name="title" placeholder="Titre"/>
                        <input type="text" name="text" placeholder="Message"/>
                        <input type="submit" name="submit" value="Publier"/>
                    </form>
                </div>
            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>
