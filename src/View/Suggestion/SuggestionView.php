<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "Suggestions";

include(__DIR__."/../../Model/Suggestion/SuggestionModel.php");
$suggestionModel = new SuggestionModel();
$suggestions = $suggestionModel->getSuggestions();
unset($suggestionModel);

?>




<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <div class="grid-y align-spaced solidBorder suggestion-container">

            <?php foreach($suggestions as $suggestion): ?>
                <div class="grid-y align-spaced solidBorder suggestion-suggestion-container">
                    <div class="grid-x align-justify">
                        <div id="suggestion-title-container"><?= $suggestion[1];?></div>
                        <div id="suggestion-author-container"><a href="/src/View/Suggestion/SuggestionsDelete.php?id=<?=$suggestion[0];?>">Supprimer</a><?= $suggestion[4]." - ".$suggestion[3];?></div>
                    </div>
                    <div id="suggestion-text-container" class="cell auto"><?= $suggestion[2];?></div>
                </div>
            <?php endforeach; ?>

        </div>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>