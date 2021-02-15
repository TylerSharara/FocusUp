<?php

//  Focus Up
//  version 1.0
//  I dont know what this is gonna be yet
//        <svg id="waves-one" viewBox="0 0 1440 600" xmlns="http://www.w3.org/2000/svg"><path d="M 0,600 C 0,600 0,200 0,200 C 74.66985645933013,218.62200956937798 149.33971291866027,237.24401913875596 245,218 C 340.66028708133973,198.75598086124404 457.31100478468886,141.64593301435409 565,148 C 672.6889952153111,154.35406698564591 771.4162679425838,224.17224880382776 880,256 C 988.5837320574162,287.82775119617224 1107.0239234449762,281.6650717703349 1202,266 C 1296.9760765550238,250.33492822966508 1368.4880382775118,225.16746411483254 1440,200 C 1440,200 1440,600 1440,600 Z" stroke="none" stroke-width="0" fill="#0e141b88" class="transition-all duration-300 ease-in-out delay-150"></path><path d="M 0,600 C 0,600 0,400 0,400 C 87.81818181818181,401.52153110047846 175.63636363636363,403.04306220095697 270,384 C 364.3636363636364,364.95693779904303 465.27272727272725,325.34928229665076 551,325 C 636.7272727272727,324.65071770334924 707.2727272727274,363.5598086124401 812,398 C 916.7272727272726,432.4401913875599 1055.6363636363635,462.41148325358853 1166,462 C 1276.3636363636365,461.58851674641147 1358.1818181818182,430.7942583732057 1440,400 C 1440,400 1440,600 1440,600 Z" stroke="none" stroke-width="0" fill="#0e141bff" class="transition-all duration-300 ease-in-out delay-150"></path></svg>

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Focus Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
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
        <svg id="waves-one" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill-opacity="1" d="M0,32L60,64C120,96,240,160,360,186.7C480,213,600,203,720,176C840,149,960,107,1080,85.3C1200,64,1320,64,1380,64L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    </div>

    <div class="about">
        <div class="contact-container">
            <h1 class="contact-header">Contact Us:</h1>
            <form class="contact-form" action="contactform.php" method="post">
                <input type="text" class="input" name="firstname" placeholder="First Name">
                <input type="text" class="input" name="lastname" placeholder="Last Name">
                <input type="text" class="input" name="email" placeholder="Email">
                <textarea class="contact-message" name="message" placeholder="your message"></textarea>
                <button type="submit" class="contact-button" name="submit">Send</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>

