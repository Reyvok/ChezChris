<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "Livre d'or";

if(!isset($_SESSION['username'])){
    header("Location: ./../Authentification/LoginView.php");
    exit();
}

include(__DIR__."/../../Model/GoldenBook/GoldenBookModel.php");
$goldenbookModel = new GoldenBookModel();
$books = $goldenbookModel->getBooks();

?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div class="grid-x" style="margin-top: 10px; margin-bottom: 5px;">
                <div style="margin-left: 20px;">

                </div>
            </div>

            <div class="grid-y align-spaced callout" id="opinion-add-container">
                <div><h2>Laisser mon avis</h2></div>
                <div>
                    <form method="post" action="">
                        <select id="book" name="book" title="book">
                            <?php foreach($books as $book): ?>
                                <option value="<?=$book[0];?>" <?php if(isset($_GET['book']) && $_GET['book']==$book[0]):?>selected<?php endif;?>><?= $book[1];?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="text" title="title" name="title" placeholder="Titre"/>
                        <input type="text" title="text" name="text" placeholder="Opinion"/>
                        <input type="number" step="0.1" title="note" name="note" placeholder="Note"/>
                        <button type="submit">Soumettre</button>
                    </form>
                </div>
            </div>
        </main>

        <?php
            if(isset($_POST['book']) && isset($_POST['title']) && isset($_POST['text']) && isset($_POST['note'])){
                $data['book'] = $_POST['book'];
                $data['title'] = $_POST['title'];
                $data['text'] = $_POST['text'];
                $data['note'] = $_POST['note'];
                $goldenbookModel->addOpinion($data);
                header("Location: ./GoldenBookView.php");
                exit();
            }
        ?>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>