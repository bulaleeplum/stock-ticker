<?php
if (!defined('APPPATH'))
    exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>{pagetitle}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="../assets/css/style.css" type="text/css" rel="stylesheet"/>
    </head>
    <body class="blue-grey darken-3">
        <main>
            <header>
                {header}
            </header>

            <!-- Page Content  -->
            {content}
        </main>

        <!-- Footer  -->
        <footer class="page-footer cyan darken-2">
            {footer}
        </footer>
        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="../assets/js/materialize.js"></script>
        <script src="../assets/js/functions.js"></script>
    </body>
</html>