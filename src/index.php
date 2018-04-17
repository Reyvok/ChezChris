<?php
include("D:/Stage/ChezChris/src/View/head.php");
$_SESSION['page'] = "Accueil";

include("D:/Stage/ChezChris/src/Model/News/NewsModel.php");
$newsModel = new NewsModel();
$last3News = $newsModel->getLast3News();
unset($newsModel);

include("D:/Stage/ChezChris/src/Model/Fanfictions/FanfictionModel.php");
$fanficModel = new FanfictionModel();
$lastFanfic = $fanficModel->getLastFiction();
unset($fanficModel);

include("D:/Stage/ChezChris/src/Model/Forum/ForumModel.php");
$forumModel = new ForumModel();
$last2Topics = $forumModel->getLast2Topics();
unset($forumModel);

include("D:/Stage/ChezChris/src/Model/GoldenBook/GoldenBookModel.php");
$goldenBookModel = new GoldenBookModel();
$last2Opinions = $goldenBookModel->getLast2Opinions(1);

var_dump($last2Opinions);
?>



<body>

    <div id="page">
        <?php include("D:/Stage/ChezChris/src/View/nav.php"); ?>

        <main class="grid-x align-spaced">
            <div class="grid-y align-spaced home-left-container">

                <!-------- News container -------->
                <div class="grid-y align-spaced solidBorder home-news-container">
                    <div class="cell medium"><h2>Dernières news</h2></div>

                    <div class="grid-x align-spaced text-center">
                        <div class="cell auto solidBorder" id="home-news1">
                            <div class="grid-x align-justify home-news-news-container">
                                <div><strong><?php echo $last3News[0][0]; ?></strong></div>
                                <div><?php echo explode(" ",$last3News[0][2])[0]." - ".$last3News[0][3]; ?></div>
                            </div>
                            <div class="home-news-text-container" style="overflow: scroll"><?php echo $last3News[0][1]; ?></div>
                        </div>
                        <div class="cell auto solidBorder" id="home-news2">
                            <div class="grid-x align-justify home-news-news-container">
                                <div><strong><?php echo $last3News[1][0]; ?></strong></div>
                                <div><?php echo explode(" ",$last3News[1][2])[0]." - ".$last3News[1][3]; ?></div>
                            </div>
                            <div class="home-news-text-container" style="overflow: scroll"><?php echo $last3News[1][1]; ?></div>
                        </div>
                        <div class="cell auto solidBorder" id="home-news3">
                            <div class="grid-x align-justify home-news-news-container">
                                <div><strong><?php echo $last3News[2][0]; ?></strong></div>
                                <div><?php echo explode(" ",$last3News[2][2])[0]." - ".$last3News[2][3]; ?></div>
                            </div>
                            <div class="home-news-text-container" style="overflow: scroll"><?php echo $last3News[2][1]; ?></div>
                        </div>
                    </div>
                </div>


                <!-------- Fan container -------->
                <div class="grid-x align-spaced home-fan-container">
                    <div class="grid-y align-spaced solidBorder home-fiction-container">
                        <div class="cell medium"><h2>Dernière fiction</h2></div>

                        <div class="grid-y solidBorder" id="home-fanfiction">
                            <div class="grid-x align-justify">
                                <div><strong><?php echo $lastFanfic[0][0]; ?></strong></div>
                                <div><?php echo $lastFanfic[0][3]; ?></div>
                                <div>Download</div>
                            </div>

                            <div class="cell auto" id="home-fanfiction-text-container">
                                <?php echo $lastFanfic[0][1]; ?>
                            </div>
                        </div>
                    </div>

                    <div class="grid-y align-spaced solidBorder home-art-container">
                        <div class="cell medium"><h2>Dernier fanart</h2></div>

                        <div class="cell medium solidBorder" id="home-fanart">Fanart</div>
                    </div>
                </div>
            </div>


            <!-------- Topics & Opinions container -------->
            <div class="grid-y align-spaced home-right-container">
                <div class="grid-y align-spaced solidBorder home-topic-container">
                    <div class="cell medium"><h2>Derniers topics</h2></div>

                    <div class="grid-y solidBorder" id="home-topic1">
                        <div class="grid-x align-justify">
                            <div><strong><?php echo $last2Topics[0][0]; ?></strong></div>
                            <div><?php echo explode(" ",$last2Topics[0][1])[0]." - ".$last2Topics[0][2]; ?></div>
                        </div>
                        <div class="cell auto" style="overflow: scroll"><?php echo $last2Topics[0][3]; ?></div>
                    </div>
                    <div class="cell medium solidBorder" id="home-topic2">Topic 2</div>
                </div>

                <div class="grid-y align-spaced solidBorder home-opinion-container">
                    <div class="cell medium"><h2>Derniers avis</h2></div>

                    <div class="grid-y solidBorder" id="home-opinion1">
                        <div class="grid-x align-justify">
                            <div><strong><?php echo $last2Opinions[0][0]." - ".$last2Opinions[0][2]; ?></strong></div>
                            <div><?php echo explode(" ",$last2Opinions[0][3])[0]." - ".$last2Opinions[0][4]; ?></div>
                        </div>
                        <div class="cell auto" style="overflow: scroll"><?php echo $last2Opinions[0][1]; ?></div>
                    </div>
                    <div class="grid-y solidBorder" id="home-opinion2">
                        <div class="grid-x align-justify">
                            <div><strong><?php echo $last2Opinions[1][0]." - ".$last2Opinions[1][2]; ?></strong></div>
                            <div><?php echo explode(" ",$last2Opinions[1][3])[0]." - ".$last2Opinions[1][4]; ?></div>
                        </div>
                        <div class="cell auto" style="overflow: scroll"><?php echo $last2Opinions[1][1]; ?></div>
                    </div>
                </div>
            </div>
        </main>

        <?php include("D:/Stage/ChezChris/src/View/footer.php"); ?>
    </div>

</body>


</html>