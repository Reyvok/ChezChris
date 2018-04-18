<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "News";
?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <div style="margin-left: 20px; margin-top: 10px;"><button>Trier par</button></div>

        <div class="grid-y align-spaced solidBorder news-container">
            <div class="grid-y align-spaced solidBorder news-news-container">
                <div class="grid-x align-justify">
                    <div class="news-title-container"><h2>News 1</h2></div>
                    <div class="news-author-container">Auteur 01/01/2000</div>
                </div>
                <div class="news-message-container"><p>Message</p></div>
            </div>

            <div class="grid-y align-spaced solidBorder news-news-container">
                <div class="grid-x align-justify">
                    <div class="news-title-container"><h2>News 1</h2></div>
                    <div class="news-author-container">Auteur 01/01/2000</div>
                </div>
                <div class="news-message-container"><p>Message</p></div>
            </div>

            <div class="grid-y align-spaced solidBorder news-news-container">
                <div class="grid-x align-justify">
                    <div class="news-title-container"><h2>News 1</h2></div>
                    <div class="news-author-container">Auteur 01/01/2000</div>
                </div>
                <div class="news-message-container"><p>Message</p></div>
            </div>
        </div>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>