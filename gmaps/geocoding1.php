<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 5/27/2018
 * Time: 1:56 PM
 */

$sample1 = "https://maps.googleapis.com/maps/api/geocode/"
    . "json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA"
    . "&key=AIzaSyCJP1aQSw46-1QlDq8V_Tt7ZtYWyM6jTW4";

// echo $sample1;

// echo file_get_contents($sample1);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sole Shoes</title>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet'>
    <link rel='stylesheet' type='text/css' href='../css/styles.css'>
</head>

<body>
<!-- Navigation -->
<nav>
    <div class='container'>
        <h2>Postcode</h2>
        <div>
            <span class='menu-button'>Menu</span>
            <span class='login-button'>Login</span>
        </div>
    </div>
</nav>

<!-- Nav Menu -->
<div class='nav-menu hide'>
    <div class='container'>
        <ul>
            <li>Shoes</li>
            <li>Women's Shoes</li>
            <li>Men's Shoes</li>
            <li>Shoe Accessories</li>
            <li>Wholesale</li>
        </ul>
        <ul>
            <li>Contact</li>
            <li>Twitter</li>
            <li>Facebook</li>
            <li>Instagram</li>
            <li>Email</li>
        </ul>
    </div>
</div>

<!-- Login Form -->
<div class='login-form'>
    <div class='container'>
        <form>
            <h4>Username</h4>
            <input class='username'/>
            <h4>Password</h4>
            <input type='password'/>
            <input class='sign-in-button' type='submit' value='Sign In'/>
        </form>
    </div>
</div>

<!-- Postcode finder input card -->
<div class='container'>
    <div class='product-card'>
        <div class='product-photo sole-air-ii'>
            <h1 class="text-center">Postcode Finder</h1>
            <p class="text-center">Enter an address to get the postcode.</p>
        </div>
        <div class='product-details'>
            <p class="text-center w100">
                <input id="address" class="w100" type="text" placeholder="Address to lookup">
            </p>
            <div id="find-postcode">
                <p>GO</p>
                <div class='more-details-button'>
                    <img src='https://s3.amazonaws.com/codecademy-content/courses/jquery/audit/images/right-arrow.svg'/>
                </div>
            </div>
        </div>

        <div class='shoe-details'>
            <p>The ultimate in style and comfort, the Sole Air II's are great for walking and casual wearing.</p>
            <div class='size-chart'>
                <h4>Size</h4>
                <ul class='sizes'>
                    <li>8</li>
                    <li>9</li>
                    <li>10</li>
                    <li>11</li>
                    <li>12</li>
                </ul>
            </div>
            <div class='buy-now-button disabled'>
                <h3>Add to cart</h3>
            </div>
        </div>
    </div>
</div>
<!-- Postcode output -->
<div class='container'>
    <div class='product-card'>
        <div class='product-photo tidal-x'>
            <h1 id="message" class="text-center"></h1>
        </div>
        <div class='product-details'>
            <h4>Tidal X</h4>
            <div>
                <p>$40</p>
                <div class='more-details-button'>
                    <img src='https://s3.amazonaws.com/codecademy-content/courses/jquery/audit/images/right-arrow.svg'/>
                </div>
            </div>
        </div>

        <div class='shoe-details'>
            <p>The Tidal X's signature rubber midsole make this the perfect running shoe. With a soft mesh upper, and
                synthetic polymer outsole, these shoes really fly.</p>
            <div class='size-chart'>
                <h4>Size</h4>
                <ul class='sizes'>
                    <li>6</li>
                    <li>7</li>
                    <li>10</li>
                    <li>12</li>
                    <li>13</li>
                </ul>
            </div>
            <div class='buy-now-button disabled'>
                <h3>Add to cart</h3>
            </div>
        </div>

    </div>
</div>

<!-- Product Card 3 -->
<div class='container'>
    <div class='product-card'>
        <div class='product-photo dark-sole-original'></div>
        <div class='product-details'>
            <h4>Dark Sole Original</h4>
            <div>
                <p>$60</p>
                <div class='more-details-button'>
                    <img src='https://s3.amazonaws.com/codecademy-content/courses/jquery/audit/images/right-arrow.svg'/>
                </div>
            </div>
        </div>

        <div class='shoe-details'>
            <p>Light up the night with the Dark Sole Original. Lights around the midsole activate when stomped.</p>
            <div class='size-chart'>
                <h4>Size</h4>
                <ul class='sizes'>
                    <li>9</li>
                    <li>10</li>
                    <li>10.5</li>
                    <li>11</li>
                </ul>
            </div>
            <div class='buy-now-button disabled'>
                <h3>Add to cart</h3>
            </div>
        </div>
    </div>
</div>

<!-- Shopping cart -->
<div class='shopping-cart'>
    <div class='container'>
        <div class='cart'>
            <object type='image/svg+xml'
                    data='https://s3.amazonaws.com/codecademy-content/courses/jquery/audit/images/shopping-cart.svg'></object>
            <h3 class='items-qty'>1</h3>
        </div>
        <h3>Checkout</h3>
    </div>
</div>

<footer>
    <div class='container'>
        <object type='image/svg+xml'
                data='https://s3.amazonaws.com/codecademy-content/courses/jquery/audit/images/sole-logo.svg'></object>
        <div>Contact Us</div>
    </div>
</footer>

<!-- jQuery JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>

<!-- Custom JS -->
<script src='../js/main.js'></script>

</body>

</html>

