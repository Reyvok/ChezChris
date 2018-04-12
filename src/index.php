<?php include("./View/head.php"); ?>



<body>

    <div id="page">
        <?php include("./View/nav.php"); ?>

        <main class="grid-x align-spaced">
            <div class="grid-y align-spaced home-left-container">
                <div class="grid-y align-spaced solidBorder home-news-container">
                    <div class="cell medium"><h2>Dernières news</h2></div>

                    <div class="grid-x align-spaced text-center">
                        <div class="cell auto solidBorder" id="home-news1">News 1</div>
                        <div class="cell auto solidBorder" id="home-news2">News 2</div>
                        <div class="cell auto solidBorder" id="home-news3">News 3</div>
                    </div>
                </div>

                <div class="grid-x align-spaced home-fan-container">
                    <div class="grid-y align-spaced solidBorder home-fiction-container">
                        <div class="cell medium"><h2>Dernière fiction</h2></div>

                        <div class="cell medium solidBorder" id="home-fanfiction">Fiction</div>
                    </div>

                    <div class="grid-y align-spaced solidBorder home-art-container">
                        <div class="cell medium"><h2>Dernier fanart</h2></div>

                        <div class="cell medium solidBorder" id="home-fanart">Fanart</div>
                    </div>
                </div>
            </div>

            <div class="grid-y align-spaced home-right-container">
                <div class="grid-y align-spaced solidBorder home-topic-container">
                    <div class="cell medium"><h2>Derniers topics</h2></div>
                    <div class="cell medium solidBorder" id="home-topic1">Topic 1</div>
                    <div class="cell medium solidBorder" id="home-topic2">Topic 2</div>
                </div>

                <div class="grid-y align-spaced solidBorder home-opinion-container">
                    <div class="cell medium"><h2>Derniers avis</h2></div>
                    <div class="cell medium solidBorder" id="home-opinion1">Avis 1</div>
                    <div class="cell medium solidBorder" id="home-opinion2">Avis 2</div>
                </div>
            </div>
        </main>

        <?php include("./View/footer.php"); ?>
    </div>

</body>


</html>