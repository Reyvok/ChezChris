<?php

include(__DIR__."/../head.php");
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ./GoldenBookView.php");
    exit();
}
$_SESSION['page'] = "Livre d'or";

include(__DIR__."/../../Model/GoldenBook/GoldenBookModel.php");
$goldenBookModel = new GoldenBookModel();

?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div class="grid-y align-spaced callout book-add-container">

                <div><h2>Ajouter un livre</h2></div>

                <div class="grid-y">
                    <form method="post" action="">
                        <input id="book-add-title-container" type="text" name="title" placeholder="Titre">
                        <button type="submit">Ajouter</button>
                    </form>
                </div>

            </div>
        </main>

        <?php
        if(isset($_POST['title'])){
            $title = $_POST['title'];
            $goldenBookModel->addBook($title);
            header("Location: ./GoldenBookView.php");
            exit();
        };?>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>