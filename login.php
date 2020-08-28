<?php
require 'userFunctions.php';
include 'header-user.php';
// session_start();

if (isset($_SESSION['error'])) {

    // echo $_SESSION['error'];
}

?>

<div class="container" style="height:80vh">


    <div class="flex-c-c mt-5">
        <a class="nav-link" href="main.php">
            <img src="img/logo/logo.png" alt="" width="200" height=50></a>
    </div>
    <div class="wrapper fadeInDown zero-raduis mb-5 p-3">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
                <h2 class="my-2">Sign In</h2>
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="p-2 alert alert-danger" role="alert"><?= $_SESSION['error'] ?></div>

                    <?php
                        unset($_SESSION['error']); ?>
                <?php elseif (isset($_SESSION['username'])) : ?>
                    <div class="p-2 alert alert-primary" role="alert"><?= $_SESSION['username'] ?></div>

                <?php endif; ?>
            </div>





            <!-- Login Form -->
            <?php if (isset($_GET['id-article'])) : ?>
                <form method="POST" action="login.php?id-article=<?= $_GET['id-article'] ?>&category=<?= $_GET['category'] ?>" enctype="multipart/form-data">

                <?php else : ?>

                    <form method="POST" action="login.php" enctype="multipart/form-data">
                    <?php endif; ?>

                    <input type="email" id="email" class="fadeIn second zero-raduis" required name="email" placeholder="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ?>">
                    <input type="password" id="password" class="fadeIn third zero-raduis" required name="password" placeholder="password">
                    <!-- <div id="formFooter">
                    <a class="underlineHover" href="#">Forgot Password?</a>
                </div> -->
                    <input type="submit" name="submit-login" class=" fadeIn fourth zero-raduis" value="login">
                    <div class="pb-3">
                        <span>You don't have a account ?</span>
                        <a href="register.php" class="fadeIn fourth zero-raduis pc underlineHover">Register</a>
                    </div>
                    </form>


        </div>
    </div>
</div>





<?php include 'footer-user.php'; ?>