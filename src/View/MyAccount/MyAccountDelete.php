<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "Mon compte";

include(__DIR__."/../../Model/Account/AccountModel.php");
$accountModel = new AccountModel();
$account = $accountModel->getInformationsByUsername($_SESSION['username']);
unset($accountModel);

?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div class="callout">
                <h2>Confirmer la suppression du compte</h2>
                <form method="post" action="../../Model/Account/AccountDeleteModel.php">
                    <input type="hidden" name="id" value="<?php if(isset($_SESSION['idUser'])) echo $_SESSION['idUser'];?>"/>
                    <input type="password" name="password" placeholder="Mot de passe"/>
                    <?php if(isset($_SESSION['errorPsswd'])): ?>
                    <div class="callout alert" data-closable><?= $_SESSION['errorPsswd']; ?><button class="close-button" type="button" data-close>×</button></div><br/>
                    <?php endif; ?>
                    <input type="submit" name="confirm" value="Confirmer"/>
                </form>
            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>
</body>