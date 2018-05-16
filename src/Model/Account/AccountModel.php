<?php
include(__DIR__."/../../../app/config.php");

class AccountModel{
    private $link;

    public function __construct(){
        $this->link = mysqli_connect(hostname,username,password,database);
        mysqli_set_charset($this->link, "utf8");
    }


    /**
     * Get the informations of a user by id
     * @param $idUser int
     * @return array|null
     */
    public function getInformationsById($idUser){
        $sql = "SELECT a.username, a.imagePath, a.firstname, a.lastname, a.password, a.mail, a.score, g.label FROM account a
                INNER JOIN grade g ON a.grade=g.id
                WHERE a.id=".intval($idUser).";";
        $res = mysqli_query($this->link, $sql);
        $userData = mysqli_fetch_all($res);
        return $userData[0];
    }


    /**
     * Get the informations of a user by username
     * @param $username string
     * @return array|null
     */
    public function getInformationsByUsername($username){
        $sql = "SELECT a.id, a.imagePath, a.firstname, a.lastname, a.password, a.mail, a.score, g.label FROM account a
                INNER JOIN grade g ON a.grade=g.id
                WHERE username='".mysqli_real_escape_string($this->link,$username)."';";
        $res = mysqli_query($this->link, $sql);
        $userData = mysqli_fetch_all($res);
        return $userData;
    }


    /**
     * Get the image of a user
     * @param $username string
     * @return array|null
     */
    public function getImage($username){
        $sql = "SELECT imagePath FROM account WHERE username='".mysqli_real_escape_string($this->link,$username)."';";
        $res = mysqli_query($this->link, $sql);
        $img = mysqli_fetch_all($res);
        return $img;
    }


    /**
     * Get the role of a user
     * @param $username string
     * @return array|null
     */
    public function getRole($username){
        $sql = "SELECT r.label FROM role r
                INNER JOIN account a ON a.role=r.id
                WHERE a.username = '".mysqli_real_escape_string($this->link,$username)."';";
        $res = mysqli_query($this->link, $sql);
        $role = mysqli_fetch_all($res);
        return $role;
    }


    /**
     * Get the id of a user
     * @param $username string
     * @return array|null
     */
    public function getId($username){
        $sql = "SELECT id FROM account WHERE username='".mysqli_real_escape_string($this->link,$username)."';";
        $res = mysqli_query($this->link, $sql);
        $id = mysqli_fetch_all($res);
        return $id;
    }


    /**
     * Get the username of a user
     * @param $id int
     * @return mixed
     */
    public function getUsername($id){
        $sql = "SELECT username FROM account WHERE id=".intval($id).";";
        $res = mysqli_query($this->link, $sql);
        $username = mysqli_fetch_all($res);
        return $username[0][0];
    }


    /**
     * Get all usernames in the base
     * @return array|null
     */
    public function getUsernames(){
        $sql = "SELECT username FROM account;";
        $res = mysqli_query($this->link, $sql);
        $usernames = mysqli_fetch_all($res);
        return $usernames;
    }


    /**
     * Gett all emails in the base
     * @return array|null
     */
    public function getEmails(){
        $sql = "SELECT mail FROM account;";
        $res = mysqli_query($this->link, $sql);
        $mails = mysqli_fetch_all($res);
        return $mails;
    }


    /**
     * Verify if there is an account with the given username and password
     * @param $username string
     * @param $password string
     * @return array|null
     */
    public function verifyUsernameAndPassword($username, $password){
        $sql = "SELECT count(*) FROM account WHERE username='".mysqli_real_escape_string($this->link,$username)."' and password='".mysqli_real_escape_string($this->link,$password)."';";
        $res = mysqli_query($this->link, $sql);
        $data = mysqli_fetch_all($res);
        return $data[0];
    }


    /**
     * Update an account
     * @param $data array of data
     */
    public function updateAccount($data){
        if($data['imagePath'] != null)
            $sql = "UPDATE account SET username='".mysqli_real_escape_string($this->link,$data['username'])."',
                                        firstname='".mysqli_real_escape_string($this->link,$data['firstname'])."', 
                                        lastname='".mysqli_real_escape_string($this->link,$data['lastname'])."', 
                                        imagePath='".mysqli_real_escape_string($this->link,$data['imagePath'])."', 
                                        password='".mysqli_real_escape_string($this->link,$data['password'])."', 
                                        mail='".mysqli_real_escape_string($this->link,$data['mail'])."' 
                                        WHERE id=".intval($data['id']);
        else
            $sql = "UPDATE account SET username='".mysqli_real_escape_string($this->link,$data['username'])."',
                                        firstname='".mysqli_real_escape_string($this->link,$data['firstname'])."', 
                                        lastname='".mysqli_real_escape_string($this->link,$data['lastname'])."', 
                                        password='".mysqli_real_escape_string($this->link,$data['password'])."', 
                                        mail='".mysqli_real_escape_string($this->link,$data['mail'])."' 
                                        WHERE id=".intval($data['id']);
        mysqli_query($this->link, $sql);
    }


    /**
     * Verify if there is no error before updating an account
     * @param $data array
     */
    public function verifyUpdate($data){
        if((!preg_match("/^[A-z0-9_. ]{2,20}/",$data['username']))){
            $_SESSION['errorUsername'] = "Nom d'utilisateur incorrect\n";
        } else {
            $usernames = $this->getUsernames();
            foreach($usernames as $username){
                if($data['username']==$username and !isset($_SESSION['errorUsername'])){
                    $_SESSION['errorUsername'] = "Nom d\'utilisateur indisponible\n";
                    break;
                }
            }
        }
        if(!preg_match("/^[A-z ]{0,20}/",$data['firstname'])) $_SESSION['errorFName'] = "Prénom incorrect\n";
        if(!preg_match("/^[A-z ]{0,20}/",$data['lastname'])) $_SESSION['errorLName'] = "Nom incorrect\n";
        if(!preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/",$data['mail'])) $_SESSION['errorMail'] = "Adresse email incorrecte";
        if($data['password'] != $data['confirmPassword']) $_SESSION['errorPassword'] = "Mots de passe différents";
        if(!preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $data['password']) && !isset($_SESSION['errorPassword'])) $_SESSION['errorPassword'] = "Mot de passe incorrect";

        if($data['imagePath'] != null){
            date_default_timezone_set('Europe/Paris');
            $target_dir = __DIR__."/../../../assets/profil_images/";
            $imageFileType = strtolower(pathinfo($target_dir.basename($_FILES["file"]["name"]), PATHINFO_EXTENSION));
            $imagePath = "pi_".$_SESSION['username']."_".date("Y-m-d_h-i-s").".".$imageFileType;
            $target_file = $target_dir.$imagePath;

            // Check if image file is a actual image or fake image
            if (getimagesize($_FILES["file"]["tmp_name"]) == false){
                $_SESSION['errorImage'] = "File is not an image.";
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                $_SESSION['errorImage'] = "Sorry, file already exists.";
            }

            // Check file size
            if ($_FILES["file"]["size"] > $_POST['MAX_FILE_SIZE']) {
                $_SESSION['errorImage'] = "Sorry, your file is too large.";
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                $_SESSION['errorImage'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }

            if(!isset($_SESSION['errorUsername']) and !isset($_SESSION['errorFName']) and !isset($_SESSION['errorLName']) and !isset($_SESSION['errorMail']) and !isset($_SESSION['errorPassword']) and !isset($_SESSION['errorImage'])){
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    $data['imagePath'] = $imagePath;
                    $this->updateAccount($data);
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['imagePath'] = $imagePath;
                    unlink($target_dir.$data['oldImage']);
                    //header("Location: ../../View/MyAccount/MyAccountView.php");
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            if(!isset($_SESSION['errorUsername']) and !isset($_SESSION['errorFName']) and !isset($_SESSION['errorLName']) and !isset($_SESSION['errorMail']) and !isset($_SESSION['errorPassword']) and !isset($_SESSION['errorImage'])){
                $this->updateAccount($data);
                $_SESSION['username'] = $data['username'];
                //header("Location: ../../View/MyAccount/MyAccountView.php");
            }
        }


    }
}