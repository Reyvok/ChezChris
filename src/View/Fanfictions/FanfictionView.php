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

        <div class="grid-x align-justify" style="margin-top: 10px; margin-bottom: 5px;">
            <div class="grid-x">
                <div style="margin-left: 20px;"><button>Trier par</button></div>
                <div style="margin-left: 20px;"><button>Nouvelle fanfic</button></div>
            </div>
            <div><input title="search" placeholder="Rechercher"></div>
        </div>

        <div class="grid-y align-spaced solidBorder fanfictions-container">

            <?php foreach($fictions as $fiction): ?>
                <div class="grid-y solidBorder fanfictions-fiction-container">
                    <div class="grid-x align-justify">
                        <div class="grid-x">
                            <div class="fanfictions-title-container"><h2><?= $fiction[0];?></h2></div>
                            <?php if($fiction[2] != null || trim($fiction[2]) != ""): ?>
                                <div><a href="/assets/fanfictions/<?= $fiction[2];?>" download="<?= $fiction[0];?>">Download</a></div>
                            <?php endif ?>
                        </div>
                        <div class="fanfictions-author-container"><?= $fiction[4]." - ".$fiction[3];?></div>
                    </div>
                    <?php if($fiction[1] != null || trim($fiction[1])): ?>
                        <div class="fanfictions-resume-container"><p><?= $fiction[1];?></p></div>
                    <?php endif ?>
                </div>
            <?php endforeach; ?>

        </div>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>