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

        <div class="grid-x align-justify solidBorder myaccount-container">
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
                    <a href="">Mes avis</a>
                </div>
            </div>

            <div class="grid-y align-spaced" id="myaccount-right-container">
                <div>
                    <div id="myaccount-right-img-container"><img src="/assets/profil_images/<?= $account[0][1];?>" alt="img"><a href="">Modifier</a></div>
                </div>
                <div>
                    <a href="">Modifier mon mot de passe</a><br/>
                    <a href="">Supprimer mon compte</a>
                </div>
            </div>
        </div>
        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>



</html>




<?php

/*
 * Update form
 * If there is some errors, they are displayed under the inputs
 *
$form =
    "<form method='post' action=''>
        <input type='hidden' name='id' value='".$idUser."'/>
        <input type='text' name='username' value='".$userData['username']."'/>";
if(isset($_SESSION['errorUsername'])){ $form = $form."<div>".$_SESSION['errorUsername']."</div>"; unset($_SESSION['errorUsername']);}
$form = $form."<br><input type='text' name='firstname' value='".$userData['firstname']."'/>";
if(isset($_SESSION['errorFName'])){ $form = $form."<div>".$_SESSION['errorFName']."</div>"; unset($_SESSION['errorFName']);}
$form = $form."<br><input type='text' name='lastname' value='".$userData['lastname']."'/>";
if(isset($_SESSION['errorLName'])){ $form = $form."<div>".$_SESSION['errorLName']."</div>"; unset($_SESSION['errorLName']);}
$form = $form."<br><input type='text' name='mail' value='".$userData['mail']."'/>";
if(isset($_SESSION['errorMail'])){ $form = $form."<div>".$_SESSION['errorMail']."</div>"; unset($_SESSION['errorMail']);}
$form = $form."<br><input type='submit' name='confirm' value='Confirmer'/></form>";

echo $form;

/**
 * Send data to verification if all inputs are set
 *
if(isset($_POST['id']) and isset($_POST['username']) and isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['mail'])){
    $newData['id'] = $_POST['id'];
    $newData['username'] = $_POST['username'];
    $newData['firstname'] = $_POST['firstname'];
    $newData['lastname'] = $_POST['lastname'];
    $newData['mail'] = $_POST['mail'];
    $accountModel->verifyUpdate($newData);
}
 */