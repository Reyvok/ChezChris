<?php
include("./../../Model/Authentification/LoginModel.php");
include("./../head.php");
$_SESSION['page'] = "Connexion";
?>



<body>

    <div id="page">
        <?php include("./../nav.php"); ?>

        <main>
            <div class="solidBorder">
                <h2>Connexion :</h2>
                <form method="post" action="" id="login-form">
                    <?php if(isset($_SESSION['errorLogin'])){echo("<div>".$_SESSION['errorLogin']."</div><br/>"); unset($_SESSION['errorLogin']);} ?>
                    <label>Nom d'utilisateur : </label><input id="login-username" title="Nom d'utilisateur" type="text" name="username" value=""/><br/>
                    <label>Mot de passe : </label><input id="login-password" title="Mot de passe" type="password" name="password" value=""/><br/>
                    <input type="submit" name="connexion" value="Connexion"/>
                </form>
                <br/><a href="SignUpView.php">Pas de compte ? Je m'inscris</a>
            </div>
        </main>

        <?php

            /* Verify if the form is complete
            If it is, verify the informations */
            if(isset($_POST['username']) and isset($_POST['password'])){
                $data['username'] = $_POST['username'];
                $data['password'] = $_POST['password'];
                verifyInformations($data);
            }
        ?>

        <?php include("./../footer.php"); ?>
    </div>

</body>


</html>