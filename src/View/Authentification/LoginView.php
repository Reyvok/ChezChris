<?php include("./../../Model/Authentification/LoginModel.php"); ?>
<?php include("./../head.php"); ?>



<body>

    <div id="page">
        <?php include("./../nav.php"); ?>

        <div class="solidBorder">
            <h2>Connexion :</h2>
            <form method="post" action="">
                <?php if(isset($_SESSION['errorLogin'])){echo("<div>".$_SESSION['errorLogin']."</div><br/>"); unset($_SESSION['errorLogin']);} ?>
                <label>Nom d'utilisateur : </label><input title="Nom d'utilisateur" type="text" name="username" value=""/><br/>
                <label>Mot de passe : </label><input title="Mot de passe" type="password" name="password" value=""/><br/>
                <input type="submit" name="connexion" value="Connexion"/>
            </form>
            <a href="SignUpView.php">Je m'inscris</a>
        </div>

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