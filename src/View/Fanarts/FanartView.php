<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "Fanarts";

include(__DIR__."/../../Model/Fanarts/FanartModel.php");
$fanartModel = new FanartModel();
$fanarts = $fanartModel->getFanarts();
unset($fanartModel);

?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <div class="grid-x align-justify" style="margin-top: 10px; margin-bottom: 5px;">
            <div class="grid-x">
                <div style="margin-left: 20px;"><button>Trier par</button></div>
                <div style="margin-left: 20px;"><button>Nouveau fanart</button></div>
            </div>
            <div><input title="search" placeholder="Rechercher"></div>
        </div>


        <div class="grid-y align-spaced solidBorder fanarts-container">

            <?php for($i=0; $i<sizeof($fanarts); $i+=5): ?>
                <div class="grid-x align-spaced fanarts-line-container">
                <?php for($j=0; $j<5; $j++): ?>
                    <?php if($i+$j==sizeof($fanarts)) break; ?>

                    <div class="grid-y solidBorder fanarts-art-container">
                        <div><h2><?= $fanarts[$i+$j][0];?></h2></div>
                        <div><?= $fanarts[$i+$j][3]." - ".$fanarts[$i+$j][2]; ?></div>
                        <div class="fanarts-art-img-container"><img src="/assets/fanarts/<?= $fanarts[$i+$j][1];?>" alt="<?= $fanarts[$i+$j][1];?>"/></div>
                    </div>

                <?php endfor;?>
                </div>
            <?php endfor; ?>

        </div>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>