<?php session_start(); ?>

<header>
    <h1>Chez Chris</h1>
</header>
<nav id="nav" data-sticky-container>
    <div class="title-bar-container" data-sticky data-top-anchor="nav" data-btm-anchor="page:bottom" data-options="marginTop:0; stickyOn:small">
        <div class="title-bar">
            <div class="title-bar-title">
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
            </div>
        </div>
    </div>
</nav>
