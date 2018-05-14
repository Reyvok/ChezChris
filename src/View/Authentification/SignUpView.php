<?php
include(__DIR__."/../head.php");
$_SESSION['page'] = "Inscription";
?>


<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <div class="callout">
            <h2>Création d'un nouveau compte :</h2>
            <form method="post" action="./../../Model/Authentification/SignUpModel.php">
                <label>*Nom d'utilisateur : </label><input title="Nom d'utilisateur" type="text" name="username" value=""><br/>
                <?php if(isset($_SESSION['errorUsername'])): ?><div class="callout alert" data-closable><?= $_SESSION['errorUsername']; ?><button class="close-button" type="button" data-close>×</button></div><br/><?php unset($_SESSION['errorUsername']); endif; ?>
                <label>Prénom : </label><input title="Prénom" type="text" name="firstname" value=""><br/>
                <?php if(isset($_SESSION['errorFName'])): ?><div class="callout alert" data-closable><?= $_SESSION['errorFName']; ?><button class="close-button" type="button" data-close>×</button></div><br/><?php unset($_SESSION['errorFName']); endif; ?>
                <label>Nom : </label><input title="Nom" type="text" name="lastname" value=""><br/>
                <?php if(isset($_SESSION['errorLName'])): ?><div class="callout alert" data-closable><?= $_SESSION['errorLName']; ?><button class="close-button" type="button" data-close>×</button></div><br/><?php unset($_SESSION['errorLName']); endif; ?>
                <label>*Adresse mail : </label><input title="Adresse mail" type="email" name="mail" value=""><br/><br/>
                <?php if(isset($_SESSION['errorMail'])): ?><div class="callout alert" data-closable><?= $_SESSION['errorMail']; ?><button class="close-button" type="button" data-close>×</button></div><br/><?php unset($_SESSION['errorMail']); endif; ?>
                <label>*Mot de passe : </label><input title="Mot de passe" type="password" name="password" value=""><br/>
                <label>*Confirmer mot de passe : </label><input title="Confirmer mot de passe" type="password" name="confirmPassword" value=""><br/>
                <?php if(isset($_SESSION['errorPsswd'])): ?><div class="callout alert" data-closable><?= $_SESSION['errorPsswd']; ?><button class="close-button" type="button" data-close>×</button></div><br/><?php unset($_SESSION['errorPsswd']); endif; ?>
                <input type="submit" name="registration" value="Inscription">
            </form>
        </div>

        <?php include(__DIR__."/../footer.php"); ?>

    </div>

</body>


</html>