<?php
include("./../head.php");
$_SESSION['page'] = "Forum";
?>



<body>

    <div id="page">
        <?php include("./../nav.php"); ?>

        <div class="grid-y align-spaced solidBorder forum-container">
            <div class="grid-y align-spaced solidBorder forum-category-container">
                <div class="grid-x align-justify">
                    <div class="grid-x">
                        <div><button>-</button></div><div><h2>Catégorie 1</h2></div>
                    </div>
                    <div>Topics</div>
                </div>
                <div class="grid-x align-justify forum-category-theme-container">
                    <div><h3>Thème 1</h3></div><div>2</div>
                </div>
                <div class="grid-x align-justify forum-category-theme-container">
                    <div><h3>Thème 2</h3></div><div>4</div>
                </div>
                <div class="grid-x align-justify forum-category-theme-container">
                    <div><h3>Thème 3</h3></div><div>1</div>
                </div>
            </div>

            <div class="grid-y align-spaced solidBorder forum-category-container">
                <div class="grid-x">
                    <div><button>+</button></div><div><h2>Catégorie 2</h2></div>
                </div>
            </div>

            <div class="grid-y align-spaced solidBorder forum-category-container">
                <div class="grid-x align-justify">
                    <div class="grid-x">
                        <div><button>-</button></div><div><h2>Catégorie 3</h2></div>
                    </div>
                    <div>Topics</div>
                </div>
                <div class="grid-x align-justify forum-category-theme-container">
                    <div><h3>Thème 1</h3></div><div>2</div>
                </div>
            </div>
        </div>

        <?php include("./../footer.php"); ?>
    </div>

</body>


</html>