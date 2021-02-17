<?php

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Focus Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
</head>



<body>

    <div class="menu-bar">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand"><img src="media/Logo.png" alt="FocusUp Logo" id="logo"></a>
                <button class="navbar-toggler hamburger" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Stuff</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Things</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Whatever</a>
                        </li>
                        <a href="login.php" class="login-menu-button">Login</a>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="hero-section">
        <div class="login-container">
            <h1 class="login-header">FocusUp Login</h1>
            <form class="login-form" action="" method="post">
                <input type="text" class="input" name="email" placeholder="Email">
                <input type="password" class="input" name="pass" placeholder="Password">
                <button type="submit" class="login-button" name="submit">Login</button>
            </form>
        </div>
        <svg id="waves-one" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill-opacity="1" d="M0,32L60,64C120,96,240,160,360,186.7C480,213,600,203,720,176C840,149,960,107,1080,85.3C1200,64,1320,64,1380,64L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
