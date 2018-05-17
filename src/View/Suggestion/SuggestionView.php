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

        <div class="grid-y align-spaced callout suggestion-container">

            <?php foreach($suggestions as $suggestion): ?>
                <div class="grid-y align-spaced callout small suggestion-suggestion-container">
                    <div class="grid-x align-justify">
                        <div id="suggestion-title-container"><?= $suggestion[1];?></div>
                        <div id="suggestion-author-container"><a href="/src/View/Suggestion/SuggestionsDelete.php?id=<?=$suggestion[0];?>">Supprimer</a><?= $suggestion[3]." - <a href='/src/View/Account/AccountView.php?id=".$suggestion[5]."'>".$suggestion[4]."</a>";?></div>
                    </div>
                    <div id="suggestion-text-container" class="cell auto"><?= $suggestion[2];?></div>
                </div>
            <?php endforeach; ?>

        </div>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>