<?php
include("./../header.php");
include("./../nav.php");
?>


<body>

    <div class="grid-y align-spaced solidBorder">
        <div class="grid-y align-spaced solidBorder">
            <div class="grid-x">
                <div><button>-</button></div><div><h2>Catégorie 1</h2></div><div>Topics</div>
            </div>
            <div class="grid-x">
                <div><h3>Thème 1</h3></div><div>2</div>
            </div>
            <div class="grid-x">
                <div><h3>Thème 2</h3></div><div>4</div>
            </div>
            <div class="grid-x">
                <div><h3>Thème 3</h3></div><div>1</div>
            </div>
        </div>

        <div class="grid-y align-spaced solidBorder">
            <div class="grid-x">
                <div><button>+</button></div><div><h2>Catégorie 2</h2></div>
            </div>
        </div>

        <div class="grid-y align-spaced solidBorder">
            <div class="grid-x">
                <div><button>-</button></div><div><h2>Catégorie 3</h2></div><div>Topics</div>
            </div>
            <div class="grid-x">
                <div><h3>Thème 1</h3></div><div>2</div>
            </div>
        </div>
    </div>

</body>


<?php include("./../footer.php");