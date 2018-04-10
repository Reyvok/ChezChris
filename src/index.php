<?php
include("./View/header.php");
include("./View/nav.php");
?>



<body>

<div class="grid-x grid-padding-x">
    <div class="grid-y grid-padding-y">
        <div class="grid-y grid-padding-y">
            <div class="cell medium"><h1>Dernières news</h1></div>

            <div class="grid-x grid-padding-x">
                <div class="cell small-4" id="news1">News 1</div>
                <div class="cell small-4" id="news2">News 2</div>
                <div class="cell small-4" id="news3">News 3</div>
            </div>
        </div>

        <div class="grid-x grid-padding-x">
            <div class="grid-y grid-padding-y">
                <div class="cell medium"><h1>Dernière fiction</h1></div>

                <div class="cell medium" id="fanfiction">Fiction</div>
            </div>

            <div class="grid-y grid-padding-y">
                <div class="cell medium"><h1>Dernier fanart</h1></div>

                <div class="cell medium" id="fanart">Fanart</div>
            </div>
        </div>
    </div>

    <div class="grid-y grid-padding-y">
        <div class="grid-y grid-padding-y">
            <div class="cell medium"><h1>Derniers topics</h1></div>
            <div class="cell medium" id="topic1">Topic 1</div>
            <div class="cell medium" id="topic2">Topic 2</div>
        </div>

        <div class="grid-y grid-padding-y">
            <div class="cell medium"><h1>Derniers avis</h1></div>
            <div class="cell medium" id="opinion1">Avis 1</div>
            <div class="cell medium" id="opinion2">Avis 2</div>
        </div>
    </div>
</div>

</body>



<?php include("./View/footer.php"); ?>



</html>