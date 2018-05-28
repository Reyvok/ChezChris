<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "Mes fanarts";

include(__DIR__."/../../Model/Fanarts/FanartModel.php");
$fanartModel = new FanartModel();
$fanarts = $fanartModel->getMyFanarts($_SESSION['idUser']);
unset($fanartModel);

?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div><a href="/src/View/Fanarts/FanartAdd.php">Nouveau fanart</a></div>

            <div class="grid-y align-spaced callout">

                <?php for($i=0; $i<sizeof($fanarts); $i+=5): ?>
                    <div class="grid-x align-spaced">
                    <?php for($j=0; $j<5; $j++): ?>
                        <?php if($i+$j==sizeof($fanarts)) break; ?>

                        <div class="grid-y callout small">
                            <div><h2><?= $fanarts[$i+$j][0];?></h2></div>
                            <div><a href="/src/View/Fanarts/FanartDelete.php?id=<?= $fanarts[$i+$j][3];?>">Supprimer</a></div>
                            <div><?= $fanarts[$i+$j][2]; ?></div>
                            <div class="fanarts-art-img-container"><img src="/assets/fanarts/<?= $fanarts[$i+$j][1];?>" alt="<?= $fanarts[$i+$j][1];?>"/></div>
                        </div>

                    <?php endfor;?>
                    </div>
                <?php endfor; ?>

            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>

