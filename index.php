<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 2/8/2018
 * Time: 4:47 PM
 */

//some settings
$random_images = array(
    'http://icons.iconarchive.com/icons/zairaam/bumpy-planets/256/07-jupiter-icon.png',
    'http://www.princeton.edu/~willman/planetary_systems/Sol/Saturn/Saturn.gif',
    'http://www.solstation.com/stars/venus.gif',
    'http://quest.nasa.gov/mars/background/images/mars.gif'
);

$cover_image = 'http://www.lovethispic.com/uploaded_images/20521-Rocky-Beach-Sunset.jpg';

//php code here

?>
<!doctype html>
<html lang="en">
<head>
    <title>Three29 Test</title>
    <style>

        /* http://meyerweb.com/eric/tools/css/reset/
           v2.0 | 20110126
           License: none (public domain)
        */
        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed,
        figure, figcaption, footer, header, hgroup,
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }

        /* HTML5 display-role reset for older browsers */
        article, aside, details, figcaption, figure,
        footer, header, hgroup, menu, nav, section {
            display: block;
        }

        body {
            line-height: 1;
            font-family: sans-serif;
        }

        ol, ul {
            list-style: none;
        }

        blockquote, q {
            quotes: none;
        }

        blockquote:before, blockquote:after,
        q:before, q:after {
            content: '';
            content: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }
    </style>

    <style>
        #div1 {
            width: 25%;
            height: 140px;
            background: #fff url("http://www.lovethispic.com/uploaded_images/20521-Rocky-Beach-Sunset.jpg") center/cover no-repeat;
        }

        #div2 {
            width: 75%;
            background-color: orange;
            height: 140px;
        }

        #div3 {
            width: 50%;
            background-color: blue;
            height: 140px;
        }

        #div4 {
            width: 90%;
            background-color: yellow;
            height: 140px;
        }
    </style>
</head>


<body>

<br><br>

<h1>Hello World ^_^/</h1>

<br><br>

<div id="wrapper">
    <div id="div1" class="divitem">
    </div>
    <div id="div2" class="divitem">
    </div>
    <div id="div3" class="divitem">
    </div>
    <div id="div4" class="divitem">
    </div>
</div>

<!-- Vendor JS -->
<!--<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>-->

<!-- Custom JS -->
<script>
    //javascript code here
    
</script>

</body>
</html>