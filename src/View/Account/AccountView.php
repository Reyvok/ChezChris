<?php

if(!isset($_GET['id']) || $_GET['id']==null){
    header("Location: ./../../index.php");
    exit();
}

include(__DIR__."/../../Model/Account/AccountModel.php");
$accountModel = new AccountModel();
$user = $accountModel->getInformationsById($_GET['id']);

include(__DIR__."/../../Model/Fanarts/FanartModel.php");
$fanartModel = new FanartModel();
$fanarts = $fanartModel->getLast2Fanarts($_GET['id']);

include(__DIR__."/../../Model/Fanfictions/FanfictionModel.php");
$fanficModel = new FanfictionModel();
$fictions = $fanficModel->getLast2Fictions($_GET['id']);

include(__DIR__."/../head.php");
$_SESSION['page'] = $user[0];
?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <div class="grid-x align-spaced callout account-container">
            <div class="grid-y align-spaced">
                <div class="grid-x">
                    <div><img src="/assets/profil_images/<?=$user[1];?>" alt="img" style="height:100px; width:auto;"></div>
                    <div class="grid-y">
                        <div><?= $user[0];?></div>
                        <div><?= $user[5];?></div>
                        <div><?= $user[6];?></div>
                    </div>
                </div>
                <div>
                    <a href="/src/View/Account/AccountFanartsView.php?id=<?=$_GET['id'];?>">Fanarts de <?=$user[0];?></a><br/>
                    <a href="/src/View/Account/AccountFanfictionsView.php?id=<?=$_GET['id'];?>">Fanfictions de <?=$user[0];?></a>
                </div>
            </div>

            <div class="grid-y align-spaced callout" id="account-fanarts-container">
                <div><h2>Ses derniers fanarts</h2></div>

                <?php foreach($fanarts as $fanart):?>
                    <div class="grid-x align-right account-art-container">
                        <div><h3><?= $fanart[0]; ?></h3></div>
                        <div class="account-art-img-container"><img src="/assets/fanarts/<?= $fanart[1]; ?>" alt="img"></div>
                    </div>
                <?php endforeach;?>

            </div>

            <div class="grid-y align-spaced callout" id="account-fanfictions-container">
                <div><h2>Ses dernières fictions</h2></div>

                <?php foreach($fictions as $fiction): ?>
                    <div class="grid-y callout small account-fiction-container">
                        <div><h3><?= $fiction[0]; ?></h3></div>
                        <div class="account-fiction-resume-container"><p><?= $fiction[1]; ?></p></div>
                    </div>
                <?php endforeach;?>

            </div>
        </div>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>