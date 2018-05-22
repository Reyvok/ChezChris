<?php

include(__DIR__."/../head.php");
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ./../../index.php");
    exit();
}

$_SESSION['page'] = "Utilisateurs";

include(__DIR__."/../../Model/Account/AccountModel.php");
$accountModel = new AccountModel();
$accounts = $accountModel->getAllAccounts();
unset($accountModel);
?>

<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div class="grid-y align-spaced callout">

                <?php for($i=0; $i<sizeof($accounts); $i+=5): ?>
                    <div class="grid-x align-spaced">
                        <?php for($j=0; $j<5; $j++): ?>
                            <?php if($i+$j==sizeof($accounts)) break;?>

                            <div class="grid-y callout small">
                                <div><h3><a href="/src/View/Account/AccountView.php?id=<?= $accounts[$i+$j][0];?>"><?= $accounts[$i+$j][1];?></a></h3></div>
                                <div><img style="height:100px; width:auto;" src="/assets/profil_images/<?=$accounts[$i+$j][2];?>"></div>
                                <div>
                                    <span>Score: <?= $accounts[$i+$j][6]; ?></span><br/>
                                    <span>Grade: <?= $accounts[$i+$j][7]; ?></span>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                <?php endfor; ?>

            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>
