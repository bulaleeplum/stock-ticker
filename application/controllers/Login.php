<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     *
     */
    function index() {

        $user = $_POST['username'];
        // use portfolio model to get player list

        // loop through player list
        // if the player in the list of players is the same as the one in POST
        // set the session user data username to the one in POST

        // redirect to specific portfolio
    }
}