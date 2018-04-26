<?php

include(__DIR__."/../head.php");
$_SESSION['page'] = "Fanfictions";

if(!isset($_GET['id'])){
    header("Location: ./FanfictionView.php");
    exit();
}

include(__DIR__."/../../Model/Fanfictions/FanfictionModel.php");
$fanfictionModel = new FanfictionModel();
$fanfiction = $fanfictionModel->getFiction($_GET['id']);

?>



<body>

<div id="page">
    <?php include(__DIR__."/../nav.php"); ?>

    <div class="grid-y align-spaced solidBorder" id="fanfiction-add-container">

        <div><h2>Ajouter une fanfiction</h2></div>

        <div class="grid-y">
            <form enctype="multipart/form-data" method="post" action="">
                <input id="fanfiction-add-title-container" type="text" name="title" placeholder="Titre" value="<?php if(trim($fanfiction[0]) != "" && $fanfiction[0] != null) echo $fanfiction[0];?>"/>
                <input id="fanfiction-add-text-container" type="text" name="text" placeholder="Texte" value="<?php if(trim($fanfiction[1]) != "" && $fanfiction[1] != null) echo $fanfiction[1];?>"/>
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                <input id="fanart-add-file-container" name="file" type="file"/>
                <?php if($fanfiction[2] != null) echo "<div>".$fanfiction[2]."</div>";?>
                <div id="fanart-add-buttons-container">
                    <button type="submit">Publier</button>
                    <button type="button">Enregistrer comme brouillon</button>
                    <button type="button">Annuler</button>
                </div>
            </form>
        </div>

    </div>

    <?php
    if(isset($_POST['title']) && isset($_FILES['file']) && !empty($_FILES['file']['name'])){
        date_default_timezone_set('Europe/Paris');
        $target_dir = __DIR__."/../../../assets/fanfictions/";
        $fileType = strtolower(pathinfo($target_dir.basename($_FILES["file"]["name"]), PATHINFO_EXTENSION));
        $filePath = "ff_".$_SESSION['username']."_".date("Y-m-d_h-i-s").".".$fileType;
        $target_file = $target_dir.$filePath;
        $uploadOk = 1;

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["file"]["size"] > $_POST['MAX_FILE_SIZE']) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($fileType != "pdf") {
            echo "Sorry, only PDF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $path = $fanfictionModel->getPathFile($_GET['id']);
                if($path != null) unlink(__DIR__."/../../../assets/fanfictions/".$fanfictionModel->getPathFile($_GET['id']));
                $data['title'] = $_POST['title'];
                if(isset($_POST['text']) && $_POST['text']!="") $data['text'] = $_POST['text'];
                else $data['text'] = null;
                $data['pathfile'] = $filePath;
                $data['id'] = $_GET['id'];
                $fanfictionModel->editFanfiction($data);
                echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else if(isset($_POST['title']) && isset($_POST['text']) && $_POST['text']!=""){
        $data['title'] = $_POST['title'];
        $data['text'] = $_POST['text'];
        $data['id'] = $_GET['id'];
        $fanfictionModel->editFanfiction($data);
        header("Location: ./FanfictionView.php");
        exit();
    }
    ?>

    <?php include(__DIR__."/../footer.php"); ?>
</div>

</body>


</html>