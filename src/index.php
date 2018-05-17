<?php
include(__DIR__."/View/head.php");
$_SESSION['page'] = "Accueil";

include(__DIR__."/Model/News/NewsModel.php");
$newsModel = new NewsModel();
$last3News = $newsModel->getLast3News();
unset($newsModel);

include(__DIR__."/Model/Fanfictions/FanfictionModel.php");
$fanficModel = new FanfictionModel();
$lastFanfic = $fanficModel->getLastFiction();
unset($fanficModel);

include(__DIR__."/Model/Fanarts/FanartModel.php");
$fanartModel = new FanartModel();
$lastFanart = $fanartModel->getLastFanart();
unset($fanartModel);

include(__DIR__."/Model/Forum/ForumModel.php");
$forumModel = new ForumModel();
$last2Topics = $forumModel->getLast2Topics();
unset($forumModel);

include(__DIR__."/Model/GoldenBook/GoldenBookModel.php");
$goldenBookModel = new GoldenBookModel();
$last2Opinions = $goldenBookModel->getLast2Opinions(1);
unset($goldenBookModel);

?>



<body>

    <div id="page">
        <?php include(__DIR__."/View/nav.php"); ?>

        <main class="grid-x align-spaced">
            <div class="grid-y align-spaced home-left-container">

                <!-------- News container -------->
                <div class="grid-y align-spaced callout home-news-container">
                    <div class="cell medium"><h2>Dernières news</h2></div>

                    <div class="grid-x align-spaced text-center">
                        <div class="cell auto callout small home-news">
                            <div class="grid-x align-justify home-news-news-container">
                                <div><strong><?= $last3News[0][0]; ?></strong></div>
                                <div><?= explode(" ",$last3News[0][2])[0]." - <a href='/src/View/Account/AccountView.php?id=".$last3News[0][4]."'>".$last3News[0][3]."</a>"; ?></div>
                            </div>
                            <div class="home-news-text-container" style="overflow: scroll"><?= $last3News[0][1]; ?></div>
                        </div>
                        <div class="cell auto callout small home-news">
                            <div class="grid-x align-justify home-news-news-container">
                                <div><strong><?= $last3News[1][0]; ?></strong></div>
                                <div><?= explode(" ",$last3News[1][2])[0]." - <a href='/src/View/Account/AccountView.php?id=".$last3News[1][4]."'>".$last3News[1][3]."</a>"; ?></div>
                            </div>
                            <div class="home-news-text-container" style="overflow: scroll"><?= $last3News[1][1]; ?></div>
                        </div>
                        <div class="cell auto callout small home-news">
                            <div class="grid-x align-justify home-news-news-container">
                                <div><strong><?= $last3News[2][0]; ?></strong></div>
                                <div><?= explode(" ",$last3News[2][2])[0]." - <a href='/src/View/Account/AccountView.php?id=".$last3News[2][4]."'>".$last3News[2][3]."</a>"; ?></div>
                            </div>
                            <div class="home-news-text-container" style="overflow: scroll"><?= $last3News[2][1]; ?></div>
                        </div>
                    </div>
                </div>


                <!-------- Fan container -------->
                <div class="grid-x align-spaced home-fan-container">
                    <div class="grid-y align-spaced callout home-fiction-container">
                        <div class="cell medium"><h2>Dernière fiction</h2></div>

                        <div class="grid-y callout small" id="home-fanfiction">
                            <div class="grid-x align-justify">
                                <div><strong><?= $lastFanfic[0][0]; ?></strong></div>
                                <div><a href="/src/View/Account/AccountView.php?id=<?=$lastFanfic[0][4];?>"><?= $lastFanfic[0][3]; ?></a></div>
                                <?php
                                    if($lastFanfic[0][2] != null || trim($lastFanfic[0][2]) != ""){
                                        echo "<div><a href='/assets/fanfictions/".$lastFanfic[0][2]."' download='".$lastFanfic[0][0].".pdf'>Download</a></div>";
                                    }
                                ?>
                            </div>

                            <div class="cell auto" id="home-fanfiction-text-container">
                                <?php
                                    if($lastFanfic[0][1] != null || trim($lastFanfic[0][1]) != ""){
                                        echo $lastFanfic[0][1];
                                    } else {
                                        echo "<a href='/assets/fanfictions/".$lastFanfic[0][2]."' download='".$lastFanfic[0][0].".pdf'>Téléchargez la fiction</a>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="grid-y align-spaced callout home-art-container">
                        <div class="cell medium"><h2>Dernier fanart</h2></div>

                        <div class="grid-y callout small" id="home-fanart">
                            <div class="cell auto">
                                <div><strong><?= $lastFanart[0][0]; ?></strong></div>
                            </div>

                            <div>
                                <div class="grid-x align-justify">
                                    <div><a href="/src/View/Account/AccountView.php?id=<?=$lastFanart[0][3];?>"><?= $lastFanart[0][2]; ?></a></div>
                                    <div id="home-fanart-img-container"><img src="<?= '/assets/fanarts/'.$lastFanart[0][1]; ?>"/></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-------- Topics & Opinions container -------->
            <div class="grid-y align-spaced home-right-container">
                <div class="grid-y align-spaced callout home-topic-container">
                    <div class="cell medium"><h2>Derniers topics</h2></div>

                    <div class="grid-y callout small" id="home-topic1">
                        <div class="grid-x align-justify">
                            <div><strong><?= $last2Topics[0][0]; ?></strong></div>
                            <div><?= explode(" ",$last2Topics[0][1])[0]." - <a href='/src/View/Account/AccountView.php?id=".$last2Topics[0][3]."'>".$last2Topics[0][2]."</a>"; ?></div>
                        </div>
                        <div class="cell auto" style="overflow: scroll"><?= $last2Topics[0][4]; ?></div>
                    </div>
                    <div class="grid-y callout small" id="home-topic2">
                        <div class="grid-x align-justify">
                            <div><strong><?= $last2Topics[1][0]; ?></strong></div>
                            <div><?= explode(" ",$last2Topics[1][1])[0]." - <a href='/src/View/Account/AccountView.php?id=".$last2Topics[1][3]."'>".$last2Topics[1][2]."</a>"; ?></div>
                        </div>
                        <div class="cell auto" style="overflow: scroll"><?= $last2Topics[1][4]; ?></div>
                    </div>
                </div>

                <div class="grid-y align-spaced callout home-opinion-container">
                    <div class="cell medium"><h2>Derniers avis</h2></div>

                    <div class="grid-y callout small" id="home-opinion1">
                        <div class="grid-x align-justify">
                            <div><strong><?= $last2Opinions[0][0]." - ".$last2Opinions[0][2]; ?></strong></div>
                            <div><?= explode(" ",$last2Opinions[0][3])[0]." - <a href='/src/View/Account/AccountView.php?id=".$last2Opinions[0][5]."'>".$last2Opinions[0][4]."</a>"; ?></div>
                        </div>
                        <div class="cell auto" style="overflow: scroll"><?= $last2Opinions[0][1]; ?></div>
                    </div>
                    <div class="grid-y callout small" id="home-opinion2">
                        <div class="grid-x align-justify">
                            <div><strong><?= $last2Opinions[1][0]." - ".$last2Opinions[1][2]; ?></strong></div>
                            <div><?= explode(" ",$last2Opinions[1][3])[0]." - <a href='/src/View/Account/AccountView.php?id=".$last2Opinions[1][5]."'>".$last2Opinions[1][4]."</a>"; ?></div>
                        </div>
                        <div class="cell auto" style="overflow: scroll"><?= $last2Opinions[1][1]; ?></div>
                    </div>
                </div>
            </div>
        </main>

        <?php include(__DIR__."/View/footer.php"); ?>
    </div>

</body>


</html>