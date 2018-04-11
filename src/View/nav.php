<?php session_start(); ?>


<nav>
    <ul class="menu expanded text-center">
        <li><a href="/src/index.php">Accueil</a></li>
        <li><a href="/src/View/Forum/ForumView.php">Forum</a></li>
        <li><a href="/src/View/News/NewsView.php">News</a></li>
        <li><a href="/src/View/Fanfictions/FanfictionView.php">Fanfictions</a></li>
        <li><a href="/src/View/Fanarts/FanartView.php">Fanarts</a></li>
        <li><a href="/src/View/GoldenBook/GoldenBookView.php">Livre d'or</a></li>
        <li><a href="/src/View/Suggestion/SuggestionView.php">Suggestions</a></li>
        <?php if(isset($_SESSION['username'])) echo "<li><a href='/src/View/MyAccount/MyAccountView.php'>Mon compte</a></li><li><a href='/src/Model/Authentification/LogoutModel.php'>Déconnexion</a></li>";
        else echo "<li><a href='/src/View/Authentification/LoginView.php'>Connexion</a></li>";?>
    </ul>
</nav>