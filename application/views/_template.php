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
      <style type="text/css">
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        .icon-block {
            padding: 0 15px;
        }

        .icon-block .material-icons {
            font-size: inherit;
        }
      </style>
   </head>

   <body>
      <main>
          <nav class="light-blue lighten-1" role="navigation">
             <div class="nav-wrapper container">
                <a id="logo-container" href="/" class="brand-logo">Stock Ticker</a>
                <ul class="right hide-on-med-and-down">
                   <li><a href="/stock-history">Stock History</a></li>
                   <li><a href="/player-profile">Player Profile</a></li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                   <li><a href="/stock-history">Stock History</a></li>
                   <li><a href="/player-profile">Player Profile</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
             </div>
          </nav>
          <div class="section no-pad-bot" id="index-banner">
            <div class="container">
              <br><br>
              <h1 class="header center teal-text">{title}</h1>
              <div class="row center">
                <div id="content">
                    {content}
                </div>
              </div>
              <br><br>
            </div>
          </div>
      </main>

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
      <script>
        // needs this for <select> tags to function properly
        $(document).ready(function() {
            $('select').material_select();
        });
        // for mobile navigation menum
        (function($){
            $(function(){
                $('.button-collapse').sideNav();
            }); // end of document ready
        })(jQuery); // end of jQuery name space
      </script>
   </body>
</html>

