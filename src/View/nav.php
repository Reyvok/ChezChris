<header class="grid-x align-justify">
    <div class="grid-x">
        <div class="grid-y" style="padding-right: 10px">
            <div><h1 style="margin-bottom: 0px; height: 50px">Chez Chris</h1></div>
            <div class="grid-x align-right"><h2 style="margin-bottom: 0px; height: 50px"><?php echo $_SESSION['page']; ?></h2></div>
        </div>
        <div class="solidBorder">Réseaux</div>
    </div>
    <div>
        <?php
            if(isset($_SESSION['username'])):?>
                <span><?= $_SESSION['username'];?></span>
                <?php if(isset($_SESSION['imagePath'])):?>
                    <img style="height: 50px; width:auto;" src="/assets/profil_images/<?= $_SESSION['imagePath'] ;?>" alt="img">
                <?php endif; ?>
            <?php else: ?>
                <span>Pseudal</span>
            <?php endif; ?>
    </div>
</header>
<nav id="nav" data-sticky-container>
    <div class="title-bar-container" data-sticky data-top-anchor="nav" data-btm-anchor="page:bottom" data-options="marginTop:0; stickyOn:small">
        <div class="title-bar">
            <div class="title-bar-title" style="width: 100%">
                <ul class="menu expanded text-center">
                    <li><a href="/src/index.php">Accueil</a></li>
                    <li><a href="/src/View/Forum/ForumView.php">Forum</a></li>
                    <li><a href="/src/View/News/NewsView.php">News</a></li>
                    <li><a href="/src/View/Fanfictions/FanfictionView.php">Fanfictions</a></li>
                    <li><a href="/src/View/Fanarts/FanartView.php">Fanarts</a></li>
                    <li><a href="/src/View/GoldenBook/GoldenBookView.php">Livre d'or</a></li>
                    <?php if(isset($_SESSION['role']) && $_SESSION['role']=='admin'): ?>
                    <li><a href="/src/View/Suggestion/SuggestionView.php">Suggestions</a></li>
                    <?php else: ?>
                    <li><a href="/src/View/Suggestion/SuggestionAdd.php">Suggestions</a></li>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['username'])): ?>
                        <li><a href='/src/View/MyAccount/MyAccountView.php'>Mon compte</a></li>
                        <li><a href='/src/Model/Authentification/LogoutModel.php'>Déconnexion</a></li>
                    <?php else: ?>
                        <li><a href='/src/View/Authentification/LoginView.php'>Connexion</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
