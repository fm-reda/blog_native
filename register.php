<?php
require 'userFunctions.php';
include 'header-user.php';
// session_start();

if (isset($_SESSION['error'])) {

    // echo $_SESSION['error'];
}

?>

<div class="container">


    <div class="flex-c-c mt-5">
        <a class="nav-link" href="main.php">
            <img src="img/logo/logo.png" alt="" width="200" height=50></a>
    </div>
    <div class="wrapper fadeInDown zero-raduis mb-5 p-3">
        <div id="formContent" class="m-b-40">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
                <h2 class="my-2">Register</h2>
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="p-2 alert alert-danger" role="alert"><?= $_SESSION['error'] ?></div>

                    <?php
                        unset($_SESSION['error']); ?>
                <?php elseif (isset($_SESSION['username'])) : ?>
                    <div class="p-2 alert alert-primary" role="alert"><?= $_SESSION['username'] ?></div>

                <?php endif; ?>
            </div>





            <!-- Login Form -->
            <form method="POST" action="register.php" enctype="multipart/form-data">
                <input type="text" id="name" class="fadeIn second zero-raduis" required name="name" placeholder="Name" value="<?= (isset($_POST['name'])) ? $_POST['name'] : '' ?>">
                <input type="text" id="email" class="fadeIn second zero-raduis" required name="email" placeholder="Email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ?>">

                <input type="password" id="password" class="fadeIn third zero-raduis" name="password" placeholder="Password" required>
                <input type="password" id="c_password" class="fadeIn third zero-raduis" name="c_password" placeholder="Confirm password" required>

                <!-- <div id="formFooter">
                    <a class="underlineHover" href="#">Forgot Password?</a>
                </div> -->
                <input type="submit" name="submit-register" class=" fadeIn fourth zero-raduis" value="Register">
                <div class="pb-3">
                    <span>You have an account ?</span>
                    <a href="login.php" class="fadeIn fourth zero-raduis pc underlineHover">Sign in</a>
                </div>
            </form>


        </div>
    </div>
</div>





<?php include 'footer-user.php'; ?>