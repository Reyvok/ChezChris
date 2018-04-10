<?php session_start(); ?>


<nav>
    <ul class="menu expanded text-center">
        <li><a href="">Accueil</a></li>
        <li><a href="">Forum</a></li>
        <li><a href="">News</a></li>
        <li><a href="">Fanfictions</a></li>
        <li><a href="">Fanarts</a></li>
        <li><a href="">Livre d'or</a></li>
        <li><a href="">Suggestions</a></li>
        <?php if(isset($_SESSION['username'])) echo "<li><a href=''>Mon compte</a></li><li><a href='/ChezChris/src/Model/Authentification/LogoutModel.php'>Déconnexion</a></li>";
        else echo "<li><a href='/ChezChris/src/View/Authentification/LoginView.php'>Connexion</a></li>";?>
    </ul>
</nav>