<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "Fanfictions";

include(__DIR__."/../../Model/Fanfictions/FanfictionModel.php");
$fanficModel = new FanfictionModel();
$fictions = $fanficModel->getFictions();
unset($fanficModel);

?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div style="margin-left: 20px;"><a href="/src/View/Fanfictions/FanfictionAdd.php">Nouvelle fanfiction</a></div>

            <div class="grid-y align-spaced callout">

                <?php foreach($fictions as $fiction): ?>
                    <div class="grid-y callout small">
                        <div class="grid-x align-justify">
                            <div class="grid-x">
                                <div><h2><?= $fiction[0];?></h2></div>
                                <?php if($fiction[2] != null || trim($fiction[2]) != ""): ?>
                                    <div><a href="/assets/fanfictions/<?= $fiction[2];?>" download="<?= $fiction[0];?>">Download</a></div>
                                <?php endif ?>
                                <?php if(isset($_SESSION['idUser']) && ($_SESSION['role']==='admin' || $_SESSION['idUser'] === $fiction[5])):?><div><a href="/src/View/Fanfictions/FanfictionDelete.php?id=<?= $fiction[6];?>">Supprimer</a></div><?php endif;?>
                                <?php if(isset($_SESSION['idUser']) && $_SESSION['idUser'] === $fiction[5]):?><div><a href="/src/View/Fanfictions/FanfictionUpdate.php?id=<?= $fiction[6];?>">Modifier</a></div><?php endif;?>

                            </div>
                            <div><?= $fiction[3]." - <a href='/src/View/Account/AccountView.php?id=".$fiction[5]."'>".$fiction[4]."</a>";?></div>
                        </div>
                        <?php if($fiction[1] != null || trim($fiction[1]) != ""): ?>
                            <div><p><?= $fiction[1];?></p></div>
                        <?php endif ?>
                    </div>
                <?php endforeach; ?>

            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>