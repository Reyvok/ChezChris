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

unset($forumModel);
?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div class="grid-y callout">
                <?php foreach($messages as $message): ?>
                    <div class="grid-x align-justify callout small">
                        <div class="grid-y" style="max-width: 80%;">
                            <div><?=$message[1];?></div>
                            <div><?=$message[2];?></div>
                        </div>
                        <div class="grid-y">
                            <div><?=$message[5];?></div>
                            <div><?=explode(" ", $message[3])[0];?></div>
                            <div><?=explode(" ", $message[3])[1];?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>
