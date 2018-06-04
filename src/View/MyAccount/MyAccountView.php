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
            <div class="grid-x align-justify callout myaccount-container">
                <div class="grid-y align-spaced" id="myaccount-left-container">
                    <div class="grid-y">
                        <div>Prénom: <span id="myaccount-firstname"><?= $account[0][2];?></span></div>
                        <div>Nom: <span id="myaccount-lastname"><?= $account[0][3];?></span></div>
                        <div>Email: <span id="myaccount-email"><?= $account[0][5];?></span></div>
                        <div><a href="/src/View/MyAccount/MyAccountEdit.php">Modifier</a></div>
                    </div>

                    <div class="grid-y">
                        <span>Score: <?= $account[0][6];?></span>
                        <span>Grade: <?= $account[0][7];?></span>
                    </div>

                    <div class="grid-y">
                        <a href="/src/View/MyAccount/MyFanfictionsView.php">Mes fanfics</a>
                        <a href="/src/View/MyAccount/MyFanartsView.php">Mes fanarts</a>
                        <a href="/src/View/MyAccount/MyOpinionsView.php">Mes avis</a>
                    </div>
                </div>

                <div class="grid-y align-spaced" id="myaccount-right-container">
                    <div>
                        <div id="myaccount-right-img-container"><img src="/assets/profil_images/<?= $account[0][1];?>" alt="img"></div>
                    </div>
                    <div>
                        <a href="/src/View/MyAccount/MyAccountDelete.php">Supprimer mon compte</a>
                    </div>
                </div>
            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>
