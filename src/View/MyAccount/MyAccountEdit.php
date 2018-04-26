<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "Mon compte";

include(__DIR__."/../../Model/Account/AccountModel.php");
$accountModel = new AccountModel();
$account = $accountModel->getInformationsByUsername($_SESSION['username']);

?>



<body>

<div id="page">
    <?php include(__DIR__."/../nav.php"); ?>

    <div class="grid-x align-justify solidBorder myaccount-container">
        <div>
            <form method="post" action="">
                <label>*Nom d'utilisateur : </label><input title="Nom d'utilisateur" type="text" name="username" value="<?= $_SESSION['username'];?>"><br/>
                <?php if(isset($_SESSION['errorUsername'])) echo '<div>'.$_SESSION['errorUsername'].'</div>'; unset($_SESSION['errorUsername']);?>
                <label>Prénom : </label><input title="Prénom" type="text" name="firstname" value="<?= $account[0][2];?>"><br/>
                <?php if(isset($_SESSION['errorFName'])) echo '<div>'.$_SESSION['errorFName'].'</div>'; unset($_SESSION['errorFName']);?>
                <label>Nom : </label><input title="Nom" type="text" name="lastname" value="<?= $account[0][3];?>"><br/>
                <?php if(isset($_SESSION['errorLName'])) echo '<div>'.$_SESSION['errorLName'].'</div>'; unset($_SESSION['errorLName']);?>
                <label>*Adresse mail : </label><input title="Adresse mail" type="email" name="mail" value="<?= $account[0][5];?>"><br/><br/>
                <?php if(isset($_SESSION['errorMail'])) echo '<div>'.$_SESSION['errorMail'].'</div>'; unset($_SESSION['errorMail']);?>
                <label>*Mot de passe : </label><input title="Mot de passe" type="password" name="password" value=""><br/>
                <?php if(isset($_SESSION['errorPassword'])) echo '<div>'.$_SESSION['errorPassword'].'</div>'; unset($_SESSION['errorPassword']);?>
                <label>*Confirmer mot de passe : </label><input title="Confirmer mot de passe" type="password" name="confirmPassword" value=""><br/>
                <input type="submit" value="Confirmer">
            </form>
        </div>
    </div>

    <?php
        if(isset($_POST['username']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['confirmPassword'])){
            $data['id'] = $_SESSION['idUser'];
            $data['username'] = $_POST['username'];
            $data['firstname'] = $_POST['firstname'];
            $data['lastname'] = $_POST['lastname'];
            $data['mail'] = $_POST['mail'];
            $data['password'] = $_POST['password'];
            $data['confirmPassword'] = $_POST['confirmPassword'];
            $ret = $accountModel->verifyUpdate($data);
            if($ret) {
                header('Location: ./MyAccountView.php');
                exit();
            } else {
                header('Location: ./MyAccountEdit.php');
                exit();
            }
        }
    ?>

    <?php include(__DIR__."/../footer.php"); ?>
</div>

</body>



</html>