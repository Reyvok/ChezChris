<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "Livre d'or";

include(__DIR__."/../../Model/GoldenBook/GoldenBookModel.php");
$goldenbookModel = new GoldenBookModel();
$books = $goldenbookModel->getBooks();
if(isset($_GET['book']))
    $opinions = $goldenbookModel->getOpinions($_GET['book']);
else
    $opinions = $goldenbookModel->getOpinions(1);

?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <div class="grid-x" style="margin-top: 10px; margin-bottom: 5px;">
            <div style="margin-left: 20px;">
                <select id="books" name="books" title="books" onchange="window.location = $(this).val();">
                    <?php foreach($books as $book): ?>
                        <option value="/src/View/GoldenBook/GoldenBookView.php?book=<?=$book[0];?>" <?php if(isset($_GET['book']) && $_GET['book']==$book[0]):?>selected<?php endif;?>><?= $book[1];?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div style="margin-left: 20px;"><a href="/src/View/GoldenBook/OpinionAdd.php">Laisser un avis</a></div>

            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'):?>
            <div style="margin-left: 20px;"><a href="/src/View/GoldenBook/BookAdd.php">Ajouter un livre</a></div>
            <?php endif;?>
        </div>

        <div class="grid-y align-spaced solidBorder" style="padding-bottom: 10px; margin-bottom: 10px;">

            <?php foreach($opinions as $opinion): ?>
                <div class="grid-y solidBorder goldenbook-opinion-container">
                    <div class="grid-x align-justify goldenbook-head-container">
                        <div class="grid-x">
                            <div class="goldenbook-title-container"><h2><?= $opinion[0];?></h2></div>
                            <div><?= $opinion[2];?></div>
                        </div>
                        <div class="grid-y goldenbook-author-container">
                            <?php if(isset($_SESSION['username']) && $opinion[4] == $_SESSION['username']):?>
                            <div><a href="/src/View/GoldenBook/OpinionDelete.php?id=<?=$opinion[5];?>">Supprimer</a></div>
                            <?php endif;?>
                            <div><?= $opinion[4];?></div>
                            <div><?= $opinion[3];?></div>
                        </div>
                    </div>
                    <div class="goldenbook-resume-container"><?= $opinion[1];?></div>
                </div>
            <?php endforeach; ?>

        </div>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>