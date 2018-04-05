<?php
/**
 * Created by Reyvok
 * Date: 04/04/2018
 */
include("..\..\app\config.php");

$idUser = $_GET['idUser'];

$link = mysqli_connect(hostname, username, password, database);
$sql = "SELECT * FROM account WHERE id =".$idUser.";";
$res = mysqli_query($link, $sql);
$userData = mysqli_fetch_array($res);

$html =
    "<table>
        <tr><td>Username: </td><td>".$userData['username']."</td></tr>
        <tr><td>First name: </td><td>".$userData['firstname']."</td></tr>
        <tr><td>Last name: </td><td>".$userData['lastname']."</td></tr>
        <tr><td>Mail: </td><td>".$userData['mail']."</td></tr>
        <tr><td>Score: </td><td>".$userData['score']."</td></tr>
        <tr><td>Grade: </td><td>".$userData['grade']."</td></tr>
    </table>";

echo $html;

echo "<a href='chemin de modification'>Modifier les informations</a>";
echo "<a href='../Model/deconnexion.php'>Déconnexion</a>";
