<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 6/11/2019
 * Time: 8:44 AM
 */

session_start(); //

define('USERNAME', 'julius');
define('PASSWORD', 'abc123');

if (isset($_POST['login'])) {
    login();
}
else if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    logout();
}
else if (isset($_SESSION['USERNAME'])) {
    displayPage();
}
else {
    displayLoginForm();
}

function login() {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] === USERNAME && $_POST['password'] === PASSWORD) {
            $_SESSION['USERNAME'] = USERNAME;
            session_write_close();
            header('Location: login.php');
        }
        else {
            displayLoginForm('Username or Password could not be found');
        }
    }
}

function logout() {
    unset($_SESSION['USERNAME']);
    session_write_close();
    header('Location: login.php');
}

// view to display if user is already logged in
function displayPage() {
    displayPageHeader(); ?>

    <p>Welcome <?= $_SESSION['USERNAME'] ?></p>

    <p>
        <a href="login.php?action=logout">Logout</a>
    </p>

    </body>
    </html>

<?php }

// view to display if user is not logged in
function displayLoginForm(string $message = "") {
    displayPageHeader(); ?>

    <?php if ($message) {
        echo "<p class='error'>$message</p>";
    } ?>

    <h1>Security Login Form</h1>

    <form action="login.php" method="post">
        <div style="width: 70%; border: solid 1px forestgreen; padding: 8px;">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value=""/>
            <br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="">
            <br>
            <div style="clear: both">
                <input type="submit" name="login" value="Login">
            </div>
        </div>
    </form>

    </body>
    </html>

<?php }

function displayPageHeader() { ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html lang="en">
    <body>
    <head>
        <title>Login using sessions</title>
        <style>
            .error {
                color: red;
                font-weight: bold;
            }
        </style>
    </head>
<?php }

$postProcess = 'do something cool';

//