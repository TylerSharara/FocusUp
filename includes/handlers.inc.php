<?php

    require_once 'dbh.inc.php';

    //Cleaning user input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //SignUp handler
    if (isset($_POST['action']) && $_POST['action'] == 'signup') {

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

        //checking that passwords are equal and not empty
        if ($pass !== $pass2 || empty($pass)) {
            $safe = false;
            $errMsg = "Invalid Password, Your passwords must match.";
        }

        //checking password for Uppercase, Lowercase, Number & at least 8 characters
        if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z]{8,24}$/',$pass)){
            $safe = false;
            $errMsg = "Invalid Password, Your password must meet our criteria.";
        }

        $stmt = $pdo->prepare('SELECT * FROM `users` WHERE userEmail = ?;');
        $stmt->execute([$email]);
        $checkUserExists = $stmt->fetch();
        if(isset($checkUserExists['userEmail'])){
            $safe = false;
            $errMsg = "An account with the email " . $checkUserExists['userEmail'] . " is already registered.";
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

        //testing input and hashing password
        $username = test_input($_POST["email"]);
        $pass = test_input($_POST["pass"]);
        $hash = crypt($pass, "pepper");
        $errMsg = "Something went wrong";

        //Check if user exists
        $stmt = $pdo->prepare('SELECT * FROM `users` WHERE userEmail = ? AND userPass = ?;');
        $stmt->execute([$username, $hash]);
        $_SESSION['user'] = $stmt->fetch();

        //If user exists login in other wise serve error
        if(!empty($_SESSION['user']['userName'])) {
            echo '<div class="alert alert-success form-alert" role="alert">Login Successful!</div>';
            header('Location: index.php?page=home');
        }
        else if(empty($_SESSION['user']['userName']))  {
            $errMsg = "The username and password combination does not exist.";
            echo ' <div class="alert alert-danger form-alert" role="alert">'. $errMsg .'</div>';
        }
        else {
            $errMsg = "An unexpected error occured. Please try again later.";
            echo ' <div class="alert alert-danger form-alert" role="alert">'. $errMsg .'</div>';
        }
    }

    //Logout handler
    if (isset($_POST['action']) && $_POST['action'] == 'logout') {

        var_dump("hello");
        session_destroy();
        header('Location: index.php?page=home');

    }

    //Contact handler
    if (isset($_POST['action']) && $_POST['action'] == 'contact') {

        //testing input and setting up mailto() data
        $firstName = test_input($_POST['firstname']);
        $lastName = test_input($_POST['lastname']);
        $email = test_input($_POST['email']);
        $message = test_input($_POST['message']);
        $subject = $firstName . " " . $lastName;
        $mailto = "contact@tylersharara.com";

        //checking user inputs for validity
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

        //if no errors found call mail() and redirect to homepage with get parameters
        if($safe === true) {
            mail($mailto, $subject, $message);
            header("Location: index.php?mailsent");
        }
    }

    //Add list entry handler
    if (isset($_POST['action']) && $_POST['action'] == 'addTask') {

        //Getting user inputs for task
        $taskName = test_input($_POST['taskName']);
        $taskDesc = test_input($_POST['taskDesc']);
        $safe = true;

        //Checking user inputs for validity
        if(empty($taskName) || !is_string($taskName)){
            $safe = false;
            $errMsg = "Please enter a valid task name.";
        }
        if(!is_string($taskDesc)){
            $safe = false;
            $errMsg = "Please enter a valid task description.";
        }

        if($safe){

            //getting datetime because NOW() wont work in the insert for some reason
            $stmt = $pdo->prepare('SELECT NOW();');
            $stmt->execute();
            $date = $stmt->fetch();

            //inserting task is all looks good
            $sql = "INSERT INTO `tasks` (`taskName`, `taskDesc`, `taskDate`, `userID`) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$taskName, $taskDesc, $date['NOW()'], $_SESSION['user']['userID']])) {
                header('Location: index.php?page=task&added=success');
                echo '<div class="alert alert-success form-alert" role="alert">Task added!</div>';
            } else {
                header('Location: index.php?page=task&added=error');
                echo ' <div class="alert alert-danger form-alert" role="alert">Oh no! We encountered and unexpected error</div>';
            }
        }
        else {
            echo ' <div class="alert alert-danger form-alert" role="alert">' . $errMsg . '</div>';
        }

    }

    //Display tasks handler
    if (isset($_GET['page']) && $_GET['page'] == 'task') {

        $stmt = $pdo->prepare('SELECT * FROM `tasks` WHERE userID = ?;');
        $stmt->execute([$_SESSION['user']['userID']]);

        if (isset($_SESSION['tasks']['taskName'])) {
            echo '<div class="task-container">';
            while($task = $stmt->fetch()){

                //opening task div and adding task data
                echo '<div class="task">' . $task['taskName'] . '<hr class="my-4">' . $task['taskDesc'];

                //adding task toggle
                echo '<form class="task-toggle">
                      <input type="hidden" name="taskID" value="' . $task['taskID'] . '">
                      <input type="hidden" name="action" value="toggleTask">
                      <button type="submit" class="task-button" name="submit">
                      <i class="fa fa-times" aria-hidden="true"></i>
                      </button>
                      </form>';

                //closing task div
                echo '</div>';
            }

            //closing task container
            echo '</div>';
        }

    }

    //Complete task handler
    if (isset($_POST['action']) && $_POST['action'] == 'toggleTask') {

        //getting taskID
        $taskID = $_POST['taskID'];
        var_dump($taskID);

        //getting datetime because NOW() wont work in the insert for some reason
        $stmt = $pdo->prepare('SELECT NOW();');
        $stmt->execute();
        $taskDone = $stmt->fetch();

       // $sql = "UPDATE `tasks` SET taskDone=? WHERE taskID=?";
       // $stmt= $pdo->prepare($sql);
       // $stmt->execute([$taskDone, $taskID]);

    }
