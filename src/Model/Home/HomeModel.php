<?php
/**
 * Created by Reyvok
 * Date: 10/04/2018
 */

include("..\..\app\config.php");


class HomeModel{

    private $link;

    public function __construct(){
        $this->link = mysqli_connect(hostname,username,password,database);
    }


    public function getInfo(){


    }
}
