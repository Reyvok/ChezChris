<?php
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
    // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
    if ((isset($_POST['username']) && !empty($_POST['username'])) &&
        (isset($_POST['password']) && !empty($_POST['password'])) &&
        (isset($_POST['firstname']) && !empty($_POST['firstname']))&&
        (isset($_POST['lasttname']) && !empty($_POST['lastname'])) &&
        (isset($_POST['mail']) && !empty($_POST['mail']))) {

        $base = mysql_connect('localhost', 'root', '');
        mysql_select_db('chezchris', $base);

        // on recherche si ce login est déjà utilisé par un autre membre
        $sql = 'SELECT count(*) FROM account WHERE username="' . mysql_escape_string($_POST['username']) . '"';
        $req = mysql_query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
        $data = mysql_fetch_array($req);

        if ($data[0] == 0) {
            $sql = 'INSERT INTO account VALUES("", "' . mysql_escape_string($_POST['username']) . '", "' . mysql_escape_string(md5($_POST['password'])) . '")';
            mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());
            session_start();
            $_SESSION['username'] = $_POST['username'];
            header('Location: membre.php');
            exit();
        } else {
            $erreur = 'Un membre possède déjà ce login.';
        }

    }
    else {
        $erreur = 'Au moins un des champs est vide.';
    }
}
?>