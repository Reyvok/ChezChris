<?php
include("./../header.php");
include("./../nav.php");
?>


<body>

    <div class="grid-x">
        <div><button>Trier par</button></div>
        <div><button>Nouvelle fanfic</button></div>
        <div><input title="search" placeholder="Rechercher"></div>
    </div>

    <div class="grid-y align-spaced solidBorder">
        <div class="grid-y solidBorder">
            <div class="grid-x">
                <div><h2>Titre 1</h2></div><div><button>Download</button></div><div>Auteur 01/01/2000</div>
            </div>
            <div><p>Résumé</p></div>
        </div>

        <div class="grid-y solidBorder">
            <div class="grid-x">
                <div><h2>Titre 3</h2></div><div>Auteur 01/01/2000</div>
            </div>
            <div><p>Résumé</p></div>
        </div>

        <div class="grid-y solidBorder">
            <div class="grid-x">
                <div><h2>Titre 3</h2></div><div><button>Download</button></div><div>Auteur 01/01/2000</div>
            </div>
        </div>
    </div>

</body>


<?php include("./../footer.php");