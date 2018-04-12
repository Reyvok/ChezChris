<?php
include("./View/header.php");
include("./View/nav.php");
?>



<body>

<div class="grid-x align-spaced">
    <div class="grid-y align-spaced">
        <div class="grid-y solidBorder">
            <div class="cell medium"><h2>Dernières news</h2></div>

            <div class="grid-x align-spaced text-center">
                <div class="cell auto solidBorder" id="news1">News 1</div>
                <div class="cell auto solidBorder" id="news2">News 2</div>
                <div class="cell auto solidBorder" id="news3">News 3</div>
            </div>
        </div>

        <div class="grid-x solidBorder">
            <div class="grid-y">
                <div class="cell medium"><h2>Dernière fiction</h2></div>

                <div class="cell medium solidBorder" id="fanfiction">Fiction</div>
            </div>

            <div class="grid-y solidBorder">
                <div class="cell medium"><h2>Dernier fanart</h2></div>

                <div class="cell medium solidBorder" id="fanart">Fanart</div>
            </div>
        </div>
    </div>

    <div class="grid-y">
        <div class="grid-y solidBorder">
            <div class="cell medium"><h2>Derniers topics</h2></div>
            <div class="cell medium solidBorder" id="topic1">Topic 1</div>
            <div class="cell medium solidBorder" id="topic2">Topic 2</div>
        </div>

        <div class="grid-y solidBorder">
            <div class="cell medium"><h2>Derniers avis</h2></div>
            <div class="cell medium solidBorder" id="opinion1">Avis 1</div>
            <div class="cell medium solidBorder" id="opinion2">Avis 2</div>
        </div>
    </div>
</div>

</body>



<?php include("./View/footer.php"); ?>



</html>