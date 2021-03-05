<?php

    //  Focus Up
    //  version 1.0
    //  I dont know what this is gonna be yet

    session_start();
    include_once('header.php');
    require_once('includes/handlers.inc.php');

    if (isset($_GET['page']) && $_GET['page'] == 'home') {
        include('home.php');
    }
    else if (isset($_GET['page']) && $_GET['page'] == 'login') {
        include('login.php');
    }
    else if (isset($_GET['page']) && $_GET['page'] == 'signup') {
        include('signup.php');
    }
    else if (isset($_GET['page']) && $_GET['page'] == 'task') {
        include('tasks.php');
    }
    else {
        include('home.php');
    }

    include_once('footer.php');

