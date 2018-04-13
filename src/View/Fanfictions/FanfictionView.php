<?php
include("./../head.php");
$_SESSION['page'] = "Fanfictions";
?>



<body>

    <div id="page">
        <?php include("./../nav.php"); ?>

        <div class="grid-x align-justify" style="margin-top: 10px; margin-bottom: 5px;">
            <div class="grid-x">
                <div style="margin-left: 20px;"><button>Trier par</button></div>
                <div style="margin-left: 20px;"><button>Nouvelle fanfic</button></div>
            </div>
            <div><input title="search" placeholder="Rechercher"></div>
        </div>

        <div class="grid-y align-spaced solidBorder fanfictions-container">
            <div class="grid-y solidBorder fanfictions-fiction-container">
                <div class="grid-x align-justify">
                    <div class="grid-x">
                        <div class="fanfictions-title-container"><h2>Titre 1</h2></div>
                        <div><button>Download</button></div>
                    </div>
                    <div class="fanfictions-author-container">Auteur 01/01/2000</div>
                </div>
                <div class="fanfictions-resume-container"><p>Résumé</p></div>
            </div>

            <div class="grid-y solidBorder fanfictions-fiction-container">
                <div class="grid-x align-justify">
                    <div class="grid-x">
                        <div class="fanfictions-title-container"><h2>Titre 2</h2></div>
                        <div><button>Download</button></div>
                    </div>
                    <div class="fanfictions-author-container">Auteur 01/01/2000</div>
                </div>
                <div class="fanfictions-resume-container"><p>Résumé</p></div>
            </div>

            <div class="grid-y solidBorder fanfictions-fiction-container">
                <div class="grid-x align-justify">
                    <div class="grid-x">
                        <div class="fanfictions-title-container"><h2>Titre 3</h2></div>
                        <div><button>Download</button></div>
                    </div>
                    <div class="fanfictions-author-container">Auteur 01/01/2000</div>
                </div>
                <div class="fanfictions-resume-container"><p>Résumé</p></div>
            </div>
        </div>

        <?php include("./../footer.php"); ?>
    </div>

</body>


</html>