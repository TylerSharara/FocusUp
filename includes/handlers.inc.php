<?php

    //Cleaning user input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //SignUp handler
    if (isset($_POST['action']) && $_POST['action'] == 'signup') {

        require_once 'dbh.inc.php';

        $name = test_input($_POST['name']);
        $email = test_input($_POST['email']);
        $pass = test_input($_POST['pass']);
        $pass2 = test_input($_POST['pass2']);
        $safe = true;
        $errMsg = 'Something went wrong! Double check that everything is correct and try again';

        //checking for errors in name
        if(empty($name) || !is_string($name)){
            $safe = false;
            $errMsg = "Please enter a valid name.";
        }

        //checking for errors in email
        if(empty($email) || !is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $safe = false;
            $errMsg = "Please enter a valid email.";
        }

        //checking for errors in pass
        if ($pass !== $pass2 || empty($pass)) {
            $safe = false;
            $errMsg = "Invalid Password, Your passwords must match.";
        }

        //checking password for Uppercase, Lowercase, Number & at least 8 characters
        if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z]{8,24}$/',$pass)){
            $safe = false;
            $errMsg = "Invalid Password, Your password must meet our criteria.";
        }

        //$stmt = $pdo->prepare('SELECT * FROM `Cart` WHERE Customer_id = ?;');
        //$stmt->execute($id);
        //looping through users cart
        // while($cart = $stmt->fetch()){

        $stmt = $pdo->prepare('SELECT * FROM `users` WHERE userEmail = ?;');
        $stmt->execute($email);
        //looping through users cart
        $checkUserExists = $stmt->fetch();
        var_dump($checkUserExists[1]['userEmail']);
        if(isset($checkUserExists['userEmail'])){
            $safe = false;
            $errMsg = "An account with this email is already registered.";
        }

        //if safe - hash pass and insert data.
        if ($safe) {
            $hash = crypt($pass, 'pepper');
            $sql = "INSERT INTO `users` (`userName`, `userEmail`, `userPass`) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $email, $hash]);
            echo '<div class="alert alert-success form-alert" role="alert">Sign Up Successful!</div>';
        } else {
            echo ' <div class="alert alert-danger form-alert" role="alert">'. $errMsg .'</div>';
        }

    }

    //Login handler
    if (isset($_POST['action']) && $_POST['action'] == 'login') {

        $username = $_POST["email"];
        $pass = $_POST["pass"];
        $hash = crypt($pass, "pepper");
        $errMsg = "Something went wrong";

        // Problem with SELECT queries
        $stmt = $pdo->prepare('SELECT * FROM `users` WHERE userName = ? AND userPass = ?;');
        $stmt->execute([$username, $hash]);
        $_SESSION['user'] = $stmt->fetch();
        var_dump($_SESSION['user']['userName']);
        //

        if(!empty($_SESSION['user']['userName'])) {
            echo '<div class="alert alert-success form-alert" role="alert">Login Successful!</div>';
            //header('Location: index.php?page=home');
        }
        else {
            echo ' <div class="alert alert-danger form-alert" role="alert">'. $errMsg .'</div>';
        }

    }

    //Contact handler
    if (isset($_POST['action']) && $_POST['action'] == 'contact') {

        $firstName = test_input($_POST['firstname']);
        $lastName = test_input($_POST['lastname']);
        $email = test_input($_POST['email']);
        $message = test_input($_POST['message']);
        $subject = $firstName . " " . $lastName;
        $mailto = "contact@tylersharara.com";

        if(empty($firstName) || !is_string($firstName)){
            $safe = false;
            $errMsg = "Please enter a valid first name.";
        }
        if(empty($lastName) || !is_string($lastName)){
            $safe = false;
            $errMsg = "Please enter a valid last name.";
        }
        if(empty($message) || !is_string($message)){
            $safe = false;
            $errMsg = "Please enter a valid message";
        }
        if(empty($email) || !is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $safe = false;
            $errMsg = "Please enter a valid email.";
        }

        if($safe === true) {
            mail($mailto, $subject, $message);
            header("Location: index.php?mailsent");
        }

    }