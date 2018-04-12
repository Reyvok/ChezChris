<?php
session_start();
session_unset();
session_destroy();
header('Location: /ChezChris/src/index.php');
exit();
