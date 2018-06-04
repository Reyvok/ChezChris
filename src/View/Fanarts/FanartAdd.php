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

<?php
if(isset($_POST['submit']) && $_POST['submit']=="Publier") {
    if (isset($_POST['title']) && isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
        date_default_timezone_set('Europe/Paris');
        $target_dir = __DIR__ . "/../../../assets/fanarts/";
        $imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["file"]["name"]), PATHINFO_EXTENSION));
        $imagePath = "fa_" . $_SESSION['username'] . "_" . date("Y-m-d_h-i-s") . "." . $imageFileType;
        $target_file = $target_dir . $imagePath;
        $uploadOk = 1;

        if (getimagesize($_FILES["file"]["tmp_name"]) == false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["file"]["size"] > $_POST['MAX_FILE_SIZE']) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $data['title'] = $_POST['title'];
                $data['pathfile'] = $imagePath;
                $fanartModel->addFanart($data);
                header("Location: ./FanartView.php");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
?>

<body>

    <div id="page">
        <?php include(__DIR__."/../nav.php"); ?>

        <main>
            <div class="grid-y align-spaced callout">

                <div><h2>Ajouter un fanart</h2></div>

                <div class="grid-y">
                    <form enctype="multipart/form-data" method="post" action="">
                        <input type="text" name="title" placeholder="Titre"/>
                        <input type="hidden" name="MAX_FILE_SIZE" value="8388608"/>
                        <input name="file" type="file"/>
                        <input type="submit" name="submit" value="Publier">
                    </form>
                </div>

            </div>
        </main>

        <?php include(__DIR__."/../footer.php"); ?>
    </div>

</body>


</html>