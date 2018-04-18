<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "Suggestions";
?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div class="solidBorder">
                <h2>Laisser une suggestion</h2>
                <form method="post" action="" id="suggestion-form">
                    <input id="suggestion-title" type="text" name="title" title="Titre" placeholder="Titre">
                    <input id="suggestion-text" type="text" name="suggestion" title="Suggestion" placeholder="Suggestion">
                    <input type="submit" name="submit" value="Soumettre">
                </form>
            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>