<?php
include("./../head.php");
$_SESSION['page'] = "Fanarts";
?>



<body>

    <div id="page">
        <?php include("./../nav.php"); ?>

        <div class="grid-x align-justify" style="margin-top: 10px; margin-bottom: 5px;">
            <div class="grid-x">
                <div style="margin-left: 20px;"><button>Trier par</button></div>
                <div style="margin-left: 20px;"><button>Nouveau fanart</button></div>
            </div>
            <div><input title="search" placeholder="Rechercher"></div>
        </div>

        <div class="grid-y align-spaced solidBorder fanarts-container">
            <div class="grid-x align-spaced fanarts-line-container">
                <div class="grid-y solidBorder fanarts-art-container">
                    <div><h2>Fanart 1</h2></div>
                    <div>Aueur 01/01/2000</div>
                    <div><img src="" alt="img"></div>
                </div>
                <div class="grid-y solidBorder fanarts-art-container">
                    <div><h2>Fanart 2</h2></div>
                    <div>Aueur 01/01/2000</div>
                    <div><img src="" alt="img"></div>
                </div>
                <div class="grid-y solidBorder fanarts-art-container">
                    <div><h2>Fanart 3</h2></div>
                    <div>Aueur 01/01/2000</div>
                    <div><img src="" alt="img"></div>
                </div>
                <div class="grid-y solidBorder fanarts-art-container">
                    <div><h2>Fanart 4</h2></div>
                    <div>Aueur 01/01/2000</div>
                    <div><img src="" alt="img"></div>
                </div>
                <div class="grid-y solidBorder fanarts-art-container">
                    <div><h2>Fanart 5</h2></div>
                    <div>Aueur 01/01/2000</div>
                    <div><img src="" alt="img"></div>
                </div>
            </div>

            <div class="grid-x align-spaced fanarts-line-container">
                <div class="grid-y solidBorder fanarts-art-container">
                    <div><h2>Fanart 6</h2></div>
                    <div>Aueur 01/01/2000</div>
                    <div><img src="" alt="img"></div>
                </div>
                <div class="grid-y solidBorder fanarts-art-container">
                    <div><h2>Fanart 7</h2></div>
                    <div>Aueur 01/01/2000</div>
                    <div><img src="" alt="img"></div>
                </div>
                <div class="grid-y solidBorder fanarts-art-container">
                    <div><h2>Fanart 8</h2></div>
                    <div>Aueur 01/01/2000</div>
                    <div><img src="" alt="img"></div>
                </div>
                <div class="grid-y solidBorder fanarts-art-container">
                    <div><h2>Fanart 9</h2></div>
                    <div>Aueur 01/01/2000</div>
                    <div><img src="" alt="img"></div>
                </div>
                <div class="grid-y solidBorder fanarts-art-container">
                    <div><h2>Fanart 10</h2></div>
                    <div>Aueur 01/01/2000</div>
                    <div><img src="" alt="img"></div>
                </div>
            </div>
        </div>

        <?php include("./../footer.php"); ?>
    </div>

</body>


</html>