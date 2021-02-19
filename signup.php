<?php

?>


<?php include_once('header.php'); ?>

<div class="hero-section">
    <div class="login-container">
        <h1 class="login-header">SignUp</h1>
        <form class="login-form" action="includes/signup.inc.php" method="post">
            <input type="text" class="input" name="name" placeholder="Name">
            <input type="text" class="input" name="email" placeholder="Email">
            <input type="password" class="input" name="pass" placeholder="Password">
            <input type="password" class="input" name="pass2" placeholder="Repeat Password">
            <button type="submit" class="login-button" name="submit">Login</button>
        </form>
    </div>
    <svg id="waves-one" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill-opacity="1" d="M0,32L60,64C120,96,240,160,360,186.7C480,213,600,203,720,176C840,149,960,107,1080,85.3C1200,64,1320,64,1380,64L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
</div>

<?php include_once('footer.php'); ?>
