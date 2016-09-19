<?php

class View {

    public function __construct() {
        
    }


    public function output_header() {
        $base_url = "http://localhost/example";
        
        echo "<!DOCTYPE html>";
        echo "<html>";
        echo "  <head>";
        echo "    <title>fiSong</title>";
        echo "    <meta charset='UTF-8'>";
        echo "    <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "      <link rel='icon' href='http://localhost/example/image/m0.jpg'>";


        echo "     <!-- Latest compiled and minified bootstrap CSS -->";
        echo "     <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>";

        echo "    <!-- Optional theme -->";
        echo '     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">';

        echo '   <!-- Latest compiled and minified JavaScript -->';
        echo '      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>';
        echo "    <link type=\"text/css\" rel=\"stylesheet\" href=\"{$base_url}/css/style.css\">";
        echo "  </head>";
        echo "<ul>
  <li><a href=\"{$base_url}/main.php\">fiSong</a></li>

  <ul style=\"float:right;list-style-type:none;\">
    <li><a class=\"active\" href=\"{$base_url}/register.php\">Register</a></li>
    <li><a href=\"{$base_url}/login.php\">Login</a></li>
  </ul>
</ul>\"";

        // if (Controller::is_logged_in()) {
        //     echo '                     <li><a class="whitetext" href="' . $base_url . '/user.php?action=logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>  Logout</a></li>';
        //     echo '                     <li><a class="whitetext" href="' . $base_url . '/conversation.php?action=inbox"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>  Dashboard</a></li>';
        // } else {
        //     echo '                     <li><a class="whitetext" href="' . $base_url . '/views/login.php"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>  Login</a></li>';
        //     echo '                     <li><a class="whitetext" href="' . $base_url . '/user.php?action=new"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Register</a></li>';
        // }


    }

}

?>