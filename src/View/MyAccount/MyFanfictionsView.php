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
            <div class="grid-x align-justify" style="margin-top: 10px; margin-bottom: 5px;">
                <div class="grid-x">
                    <div style="margin-left: 20px;"><button>Trier par</button></div>
                    <div style="margin-left: 20px;"><a href="/src/View/Fanfictions/FanfictionAdd.php">Nouvelle fanfiction</a></div>
                </div>
                <div><input title="search" placeholder="Rechercher"></div>
            </div>

            <div class="grid-y align-spaced callout fanfictions-container">

                <?php foreach($fictions as $fiction): ?>
                    <div class="grid-y callout small fanfictions-fiction-container">
                        <div class="grid-x align-justify">
                            <div class="grid-x">
                                <div class="fanfictions-title-container"><h2><?= $fiction[0];?></h2></div>
                                <?php if($fiction[2] != null || trim($fiction[2]) != ""): ?>
                                    <div><a href="/assets/fanfictions/<?= $fiction[2];?>" download="<?= $fiction[0];?>">Download</a></div>
                                <?php endif ?>
                                <div><a href="/src/View/Fanfictions/FanfictionDelete.php?id=<?= $fiction[4];?>">Supprimer</a></div>
                                <div><a href="/src/View/Fanfictions/FanfictionUpdate.php?id=<?= $fiction[4];?>">Modifier</a></div>
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