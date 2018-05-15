<?php

include(__DIR__."/../head.php");
$_SESSION['page'] = "Fanarts";

if(!isset($_SESSION['username'])){
    header("Location: ./../Authentification/LoginView.php");
    exit();
}

include(__DIR__."/../../Model/Fanarts/FanartModel.php");
$fanartModel = new FanartModel();

?>



<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div class="grid-y align-spaced callout" id="fanart-add-container">

                <div><h2>Ajouter un fanart</h2></div>

                <div class="grid-y">
                    <form enctype="multipart/form-data" method="post" action="">
                        <input id="fanart-add-title-container" type="text" name="title" placeholder="Titre"/>
                        <input type="hidden" name="MAX_FILE_SIZE" value="8388608"/>
                        <input id="fanart-add-file-container" name="file" type="file"/>
                        <div id="fanart-add-buttons-container">
                            <button type="submit">Publier</button>
                            <button type="button">Enregistrer comme brouillon</button>
                            <button type="button">Annuler</button>
                        </div>
                    </form>
                </div>

            </div>
        </main>

        <?php
        if(isset($_POST['title']) && isset($_FILES['file']) && !empty($_FILES['file']['name'])){
            date_default_timezone_set('Europe/Paris');
            $target_dir = __DIR__."/../../../assets/fanarts/";
            $imageFileType = strtolower(pathinfo($target_dir.basename($_FILES["file"]["name"]), PATHINFO_EXTENSION));
            $imagePath = "fa_".$_SESSION['username']."_".date("Y-m-d_h-i-s").".".$imageFileType;
            $target_file = $target_dir.$imagePath;
            $uploadOk = 1;

            // Check if image file is a actual image or fake image
            if (getimagesize($_FILES["file"]["tmp_name"]) == false){
                echo "File is not an image.";
                $uploadOk = 0;
            }

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
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    $data['title'] = $_POST['title'];
                    $data['pathfile'] = $imagePath;
                    $fanartModel->addFanart($data);
                    echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        ?>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>