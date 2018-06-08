<?php
include(__DIR__."/../../Model/Authentification/LoginModel.php");
include(__DIR__."/../head.php");
$_SESSION['page'] = "Connexion";
?>


<?php

/* Verify if the form is complete
If it is, verify the informations */
if(isset($_POST['submit']) && $_POST['submit']=="Connexion") {
    if (isset($_POST['username']) and isset($_POST['password'])) {
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        verifyInformations($data);
    }
}
?>


<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div class="callout">
                <h2>Connexion :</h2>
                <form method="post" action="">
                    <?php if(isset($_SESSION['errorLogin'])){
                        echo("<div class='callout alert small' data-closable>"
                            .$_SESSION['errorLogin'].
                            "<button class='close-button' type='button' data-close>×</button></div><br/>");
                        unset($_SESSION['errorLogin']);
                    }?>
                    <label>Nom d'utilisateur : </label><input title="Nom d'utilisateur" type="text" name="username" value=""/><br/>
                    <label>Mot de passe : </label><input title="Mot de passe" type="password" name="password" value=""/><br/>
                    <input type="submit" name="submit" value="Connexion"/>
                </form>
                <br/><a href="/src/View/Authentification/SignUpView.php">Pas de compte ? Je m'inscris</a>
            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>
