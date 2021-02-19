<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['name'];
    $name = $_POST['pass'];
    $name = $_POST['pass2'];

    require_once 'dbh.inc.php';
    require_once 'handlers.inc.php';

    

}
else {
    header("Location: ../signup.php");
}
