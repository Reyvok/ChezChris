<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "Livre d'or";

include(__DIR__."/../../Model/GoldenBook/GoldenBookModel.php");
$goldenbookModel = new GoldenBookModel();
$opinions = $goldenbookModel->getOpinions(1);
unset($goldenbookModel);

?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <div class="grid-x" style="margin-top: 10px; margin-bottom: 5px;">
            <div style="margin-left: 20px;"><button>Livre</button></div>
            <div style="margin-left: 20px;"><button>Laisser un avis</button></div>
        </div>

        <div class="grid-y align-spaced solidBorder" style="padding-bottom: 10px; margin-bottom: 10px;">

            <?php foreach($opinions as $opinion): ?>
                <div class="grid-y solidBorder goldenbook-opinion-container">
                    <div class="grid-x align-justify goldenbook-head-container">
                        <div class="grid-x">
                            <div class="goldenbook-title-container"><h2><?= $opinion[0];?></h2></div>
                            <div><?= $opinion[2];?></div>
                        </div>
                        <div class="grid-y goldenbook-author-container">
                            <div><?= $opinion[4];?></div>
                            <div><?= $opinion[3];?></div>
                        </div>
                    </div>
                    <div class="goldenbook-resume-container"><?= $opinion[1];?></div>
                </div>
            <?php endforeach; ?>

        </div>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>