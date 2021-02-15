<?php

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $subject = $firstName . " " . $lastName;
    $message = $_POST['message'];

    $mailto = "contact@tylersharara.com";

    mail($mailto, $subject, $message,);

    header("Location: index1.php?mailsent");
}
