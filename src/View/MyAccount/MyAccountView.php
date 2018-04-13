<?php
include("./../head.php");
$_SESSION['page'] = "Mon compte";
?>



<body>

    <div id="page">
        <?php include("./../nav.php"); ?>

        <div class="grid-x align-justify solidBorder myaccount-container">
            <div class="grid-y align-spaced" id="myaccount-left-container">
                <div class="grid-y" id="myaccount-info1-container">
                    <div>Prénom: prénom <a href="">Modifier</a></div>
                    <div>Nom: nom <a href="">Modifier</a></div>
                    <div>Email: email@lel.fr <a href="">Modifier</a></div>
                </div>

                <div class="grid-y" id="myaccount-info2-container">
                    <span>Score: score</span>
                    <span>Grade: grade</span>
                </div>

                <div class="grid-y" id="myaccount-info3-container">
                    <a href="">Mes fanfics</a>
                    <a href="">Mes fanarts</a>
                    <a href="">Mes avis</a>
                </div>
            </div>

            <div class="grid-y align-spaced" id="myaccount-right-container">
                <div id="myaccount-info4-container">
                    <div><img src="" alt="img"><a href="">Modifier</a></div>
                </div>
                <div id="myaccount-info5-container">
                    <a href="">Modifier mon mot de passe</a><br/>
                    <a href="">Supprimer mon compte</a>
                </div>
            </div>
        </div>
        <?php include("./../footer.php"); ?>
    </div>

</body>


</html>




<?php
/*   Account Update
 *

$idUser = $_GET['idUser'];
$accountModel = new MyAccountModel();
$userData = $accountModel->getInformations($idUser);

session_start();

/**
 * Update form
 * If there is some errors, they are displayed under the inputs
 *
$form =
    "<form method='post' action=''>
        <input type='hidden' name='id' value='".$idUser."'/>
        <input type='text' name='username' value='".$userData['username']."'/>";
if(isset($_SESSION['errorUsername'])){ $form = $form."<div>".$_SESSION['errorUsername']."</div>"; unset($_SESSION['errorUsername']);}
$form = $form."<br><input type='text' name='firstname' value='".$userData['firstname']."'/>";
if(isset($_SESSION['errorFName'])){ $form = $form."<div>".$_SESSION['errorFName']."</div>"; unset($_SESSION['errorFName']);}
$form = $form."<br><input type='text' name='lastname' value='".$userData['lastname']."'/>";
if(isset($_SESSION['errorLName'])){ $form = $form."<div>".$_SESSION['errorLName']."</div>"; unset($_SESSION['errorLName']);}
$form = $form."<br><input type='text' name='mail' value='".$userData['mail']."'/>";
if(isset($_SESSION['errorMail'])){ $form = $form."<div>".$_SESSION['errorMail']."</div>"; unset($_SESSION['errorMail']);}
$form = $form."<br><input type='submit' name='confirm' value='Confirmer'/></form>";

echo $form;

/**
 * Send data to verification if all inputs are set
 *
if(isset($_POST['id']) and isset($_POST['username']) and isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['mail'])){
    $newData['id'] = $_POST['id'];
    $newData['username'] = $_POST['username'];
    $newData['firstname'] = $_POST['firstname'];
    $newData['lastname'] = $_POST['lastname'];
    $newData['mail'] = $_POST['mail'];
    $accountModel->verifyUpdate($newData);
}
 */