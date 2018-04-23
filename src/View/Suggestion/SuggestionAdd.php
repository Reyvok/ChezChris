<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "Suggestions";

include(__DIR__."/../../Model/Suggestion/SuggestionModel.php");
$suggestionModel = new SuggestionModel();

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
                    <button type="submit">Soumettre</button>
                </form>
            </div>
        </main>

        <?php
            if(isset($_POST['title']) && isset($_POST['suggestion'])){
                $data['title'] = $_POST['title'];
                $data['suggestion'] = $_POST['suggestion'];
                $suggestionModel->addSuggestion($data);
            }
        ?>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>