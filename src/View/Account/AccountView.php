<?php include("./../head.php"); ?>



<body>

    <div id="page">
        <?php include("./../nav.php"); ?>

        <div class="grid-x align-spaced solidBorder account-container">
            <div class="grid-y align-spaced">
                <div class="grid-x">
                    <div><img src="" alt="img"></div>
                    <div class="grid-y">
                        <div>Pseudo</div>
                        <div>Score</div>
                        <div>Grade</div>
                    </div>
                </div>
                <div>
                    <a href="">Fanarts de pseudal</a><br/>
                    <a href="">Fanfictions de pseudal</a>
                </div>
            </div>

            <div class="grid-y align-spaced solidBorder" id="account-fanarts-container">
                <div><h2>Ses derniers fanarts</h2></div>
                <div class="grid-x align-right account-art-container">
                    <div><h3>Titre</h3></div>
                    <div><img src="" alt="img"></div>
                </div>
                <div class="grid-x align-right account-art-container">
                    <div><h3>Titre</h3></div>
                    <div><img src="" alt="img"></div>
                </div>
            </div>

            <div class="grid-y align-spaced solidBorder" id="account-fanfictions-container">
                <div><h2>Ses dernières fictions</h2></div>
                <div class="grid-y solidBorder account-fiction-container">
                    <div><h3>Titre</h3></div>
                    <div class="account-fiction-resume-container"><p>Résumé</p></div>
                </div>
                <div class="grid-y solidBorder account-fiction-container">
                    <div><h3>Titre</h3></div>
                    <div class="account-fiction-resume-container"><p>Résumé</p></div>
                </div>
            </div>
        </div>

        <?php include("./../footer.php"); ?>
    </div>

</body>


</html>