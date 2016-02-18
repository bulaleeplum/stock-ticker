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

   <body>
      <main>
          <!-- Navigation  -->
          <nav class="light-blue lighten-1" role="navigation">
             <div class="nav-wrapper container">
                <a id="logo-container" href="/" class="brand-logo">Stock Ticker</a>
                <ul class="right hide-on-med-and-down">
                   <li><a href="/stock-history">Stock History</a></li>
                   <li><a href="/player-portfolio">Player Portfolio</a></li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                   <li><a href="/stock-history">Stock History</a></li>
                   <li><a href="/player-portfolio">Player Portfolio</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
             </div>
          </nav>

          <!-- Page Content  -->
          <div class="section no-pad-bot" id="index-banner">
            <div class="container">
              <br><br>
              <h1 class="header center teal-text">{pagetitle}</h1>
              <div class="row center">
                <div id="content">
                    {content}
                </div>
              </div>
              <br><br>
            </div>
          </div>
      </main>

      <!-- Footer  -->
      <footer class="page-footer light-blue lighten-1">
        <div class="footer-copyright">
          <div class="container">
          Copyright &copy; 2016 Get Rekt Scott
          </div>
        </div>
      </footer>

      <!--  Scripts-->
      <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="../assets/js/materialize.js"></script>
      <script src="../assets/js/functions.js"></script>
   </body>
</html>

