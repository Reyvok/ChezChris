<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "Mes fanfictions";

include(__DIR__."/../../Model/Fanfictions/FanfictionModel.php");
$fanficModel = new FanfictionModel();
$fictions = $fanficModel->getMyFictions($_SESSION['idUser']);
unset($fanficModel);

?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div><a href="/src/View/Fanfictions/FanfictionAdd.php">Nouvelle fanfiction</a></div>

            <div class="grid-y align-spaced callout">

                <?php foreach($fictions as $fiction): ?>
                    <div class="grid-y callout small">
                        <div class="grid-x align-justify">
                            <div class="grid-x">
                                <div><h2><?= $fiction[0];?></h2></div>
                                <?php if($fiction[2] != null || trim($fiction[2]) != ""): ?>
                                    <div><a href="/assets/fanfictions/<?= $fiction[2];?>" download="<?= $fiction[0];?>">Download</a></div>
                                <?php endif ?>
                                <div><a href="/src/View/Fanfictions/FanfictionDelete.php?id=<?= $fiction[4];?>">Supprimer</a></div>
                                <div><a href="/src/View/Fanfictions/FanfictionUpdate.php?id=<?= $fiction[4];?>">Modifier</a></div>
                            </div>
                            <div>
                                <?php if($fiction[5]==1){
                                    echo $fiction[3];
                                } else {
                                    echo 'Brouillon';
                                }
                                ?>
                            </div>
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

