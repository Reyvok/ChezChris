<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "Mon compte";

include(__DIR__."/../../Model/Account/AccountModel.php");
$accountModel = new AccountModel();
$account = $accountModel->getInformationsByUsername($_SESSION['username']);

?>

<?php
if(isset($_POST['submit']) && $_POST['submit']=="Confirmer") {
    if (isset($_POST['username']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {
        $data['id'] = $_SESSION['idUser'];
        $data['username'] = $_POST['username'];
        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['mail'] = $_POST['mail'];
        $data['password'] = $_POST['password'];
        $data['confirmPassword'] = $_POST['confirmPassword'];
        $data['oldImage'] = $account[0][1];
        if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) $data['imagePath'] = $_FILES['file']['name'];
        else $data['imagePath'] = null;
        $accountModel->verifyUpdate($data);
    }
}
?>

<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div class="grid-x align-justify callout" style="margin-bottom: 10px; margin-top: 10px; padding:10px;">
                <div style="width:100%;">
                    <form enctype="multipart/form-data" method="post" action="">
                        <div class="grid-x align-spaced" style="width:100%;">
                            <div class="grid-y align-spaced">
                                <div><label>*Nom d'utilisateur : </label><input title="Nom d'utilisateur" type="text" name="username" value="<?= $_SESSION['username'];?>"><br/></div>
                                <?php if(isset($_SESSION['errorUsername'])) echo '<div>'.$_SESSION['errorUsername'].'</div>'; unset($_SESSION['errorUsername']);?>
                                <div><label>Prénom : </label><input title="Prénom" type="text" name="firstname" <?php if($account[0][2]!=null) echo 'value="'.$account[0][2].'"';?>><br/></div>
                                <?php if(isset($_SESSION['errorFName'])) echo '<div>'.$_SESSION['errorFName'].'</div>'; unset($_SESSION['errorFName']);?>
                                <div><label>Nom : </label><input title="Nom" type="text" name="lastname" <?php if($account[0][3]!=null) echo 'value="'.$account[0][3].'"';?>><br/></div>
                                <?php if(isset($_SESSION['errorLName'])) echo '<div>'.$_SESSION['errorLName'].'</div>'; unset($_SESSION['errorLName']);?>
                                <div><label>*Adresse mail : </label><input title="Adresse mail" type="email" name="mail" value="<?= $account[0][4];?>"><br/><br/></div>
                                <?php if(isset($_SESSION['errorMail'])) echo '<div>'.$_SESSION['errorMail'].'</div>'; unset($_SESSION['errorMail']);?>
                                <div><label>*Mot de passe : </label><input title="Mot de passe" type="password" name="password" value=""><br/></div>
                                <?php if(isset($_SESSION['errorPassword'])) echo '<div>'.$_SESSION['errorPassword'].'</div>'; unset($_SESSION['errorPassword']);?>
                                <div><label>*Confirmer mot de passe : </label><input title="Confirmer mot de passe" type="password" name="confirmPassword" value=""><br/></div>
                            </div>
                            <div class="grid-y align-center">
                                <?php if($account[0][1] != null): ?>
                                <div><img style="max-height: 300px; width:auto;" src="/assets/profil_images/<?=$account[0][1];?>"/></div>
                                <div><?= $account[0][1];?></div>
                                <?php endif; ?>
                                <div><input type="hidden" name="MAX_FILE_SIZE" value="8388608"/></div>
                                <div><input name="file" type="file"/></div>
                                <div><input type="submit" name="submit" value="Confirmer"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>



</html>