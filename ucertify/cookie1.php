<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 11/17/2018
 * Time: 2:48 PM
 */


if (isset($_POST['sendInfo'])) {
    storeInfo();
}
else if (isset($_GET['action']) && $_GET['action'] === 'forget') {
    forgetInfo();
}
else {
    displayPage();
}

function storeInfo() {
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $location = isset($_POST['location']) ? $_POST['location'] : null;

    $days = function (int $numberOfDays): int {
        $secs = 60;
        $mins = 60;
        $hours = 24;

        return ($secs * $mins * $hours * $numberOfDays);
    };

    if ($username !== null) {
        setcookie(
            'username', $username, time() + $days(365), '', '', false, true
        );
    }
    else {
        echo "ERROR - username not set.";
    }

    if ($location !== null) {
        setcookie(
            'location', $location, time() + $days(365), '', '', false, true
        );
    }
    else {
        echo "ERROR - location not set.";
    }

    header('Location: jcookie1.php');
}

function forgetInfo() {
    echo "<p>will forget info</p>";

    setcookie('username', '', time() - 3600, '', '', false, true);
    setcookie('location', '', time() - 3600, '', '', false, true);
    header('Location: jcookie1.php');
}

function displayPage() {

$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
$location = isset($_COOKIE['location']) ? $_COOKIE['location'] : ''; 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <title>Preserving State With Cookies</title>
</head>


<body>

<h2>Preserving state cookies.</h2>

<?php if ($username || $location) { ?>
    <p>
        Hi,
        <?php
        echo $username ? "<b>$username</b>" : 'visitor';
        echo $location ? " in <b>$location</b>" : "";
        ?>
        Welcome to jcookie1.php
    </p>
    <p>Here is some latin (:</p>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        Eos exercitationem fugit hic id iste laboriosam maiores
        neque, quo repudiandae unde? Atque fuga iste quam ratione
        sequi sint soluta tempora veritatis!
    </p>
    <p><a href="jcookie1.php?action=forget">Erase Cookie</a></p>

<?php } else { ?>
    <form action="jcookie1.php" method="post">
        <div style="width: 40em;">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value="">

            <br><br>

            <label for="location">Location:</label><br>
            <input type="text" id="location" name="location" value="">

            <br><br>
            <input type="submit" name="sendInfo" value="Send Info">
        </div>
    </form>
<?php } ?>

<br><br><br><br>

<h4>PHP 7 Software Application</h4>

</body>
</html>

<?php } // END OF: displayPage()

