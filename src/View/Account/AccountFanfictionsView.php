<?php

if(!isset($_GET['id']) || $_GET['id']==null){
    header("Location: ./../../index.php");
    exit();
}

include(__DIR__."/../../Model/Account/AccountModel.php");
$accountModel = new AccountModel();
$username = $accountModel->getUsername($_GET['id']);

include(__DIR__."/../head.php");
$_SESSION['page'] = $username."'s fanfictions";

include(__DIR__."/../../Model/Fanfictions/FanfictionModel.php");
$fanficModel = new FanfictionModel();
$fictions = $fanficModel->getFictionsOfUser($_GET['id']);
unset($fanficModel);

?>



<body>

<div id="page">
    <?php include(__DIR__."/../nav.php"); ?>


    <main>
    <div class="grid-y align-spaced callout fanfictions-container">

        <?php foreach($fictions as $fiction): ?>
            <div class="grid-y callout small fanfictions-fiction-container">
                <div class="grid-x align-justify">
                    <div class="grid-x">
                        <div class="fanfictions-title-container"><h2><?= $fiction[0];?></h2></div>
                        <?php if($fiction[2] != null || trim($fiction[2]) != ""): ?>
                            <div><a href="/assets/fanfictions/<?= $fiction[2];?>" download="<?= $fiction[0];?>">Download</a></div>
                        <?php endif ?>
                    </div>
                    <div class="fanfictions-author-container"><?= $fiction[3];?></div>
                </div>
                <?php if($fiction[1] != null || trim($fiction[1]) != ""): ?>
                    <div class="fanfictions-resume-container"><p><?= $fiction[1];?></p></div>
                <?php endif ?>
            </div>
        <?php endforeach; ?>

    </div>
    </main>

    <?php include(__DIR__."/../footer.php"); ?>
</div>

</body>


</html>