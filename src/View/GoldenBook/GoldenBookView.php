<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "Livre d'or";
?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <div class="grid-x" style="margin-top: 10px; margin-bottom: 5px;">
            <div style="margin-left: 20px;"><button>Livre</button></div>
            <div style="margin-left: 20px;"><button>Laisser un avis</button></div>
        </div>

        <div class="grid-y align-spaced solidBorder" style="padding-bottom: 10px; margin-bottom: 10px;">
            <div class="grid-y solidBorder goldenbook-opinion-container">
                <div class="grid-x align-justify goldenbook-head-container">
                    <div class="grid-x">
                        <div class="goldenbook-title-container"><h2>Titre 1</h2></div>
                        <div>* * * * *</div>
                    </div>
                    <div class="grid-y goldenbook-author-container">
                        <div>Auteur</div>
                        <div>01/01/2000</div>
                    </div>
                </div>
                <div class="goldenbook-resume-container">Résumé</div>
            </div>
            <div class="grid-y solidBorder goldenbook-opinion-container">
                <div class="grid-x align-justify goldenbook-head-container">
                    <div class="grid-x">
                        <div class="goldenbook-title-container"><h2>Titre 2</h2></div>
                        <div>* * * * *</div>
                    </div>
                    <div class="grid-y goldenbook-author-container">
                        <div>Auteur</div>
                        <div>01/01/2000</div>
                    </div>
                </div>
                <div class="goldenbook-resume-container">Résumé</div>
            </div>
            <div class="grid-y solidBorder goldenbook-opinion-container">
                <div class="grid-x align-justify goldenbook-head-container">
                    <div class="grid-x">
                        <div class="goldenbook-title-container"><h2>Titre 3</h2></div>
                        <div>* * * * *</div>
                    </div>
                    <div class="grid-y goldenbook-author-container">
                        <div>Auteur</div>
                        <div>01/01/2000</div>
                    </div>
                </div>
                <div class="goldenbook-resume-container">Résumé</div>
            </div>
            <div class="grid-y solidBorder goldenbook-opinion-container">
                <div class="grid-x align-justify goldenbook-head-container">
                    <div class="grid-x">
                        <div class="goldenbook-title-container"><h2>Titre 4</h2></div>
                        <div>* * * * *</div>
                    </div>
                    <div class="grid-y goldenbook-author-container">
                        <div>Auteur</div>
                        <div>01/01/2000</div>
                    </div>
                </div>
                <div class="goldenbook-resume-container">Résumé</div>
            </div>
        </div>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>