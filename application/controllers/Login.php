<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     * Grabs all players from database to be added to a list
     * for possible players to log in to.
     */
    function index() {
        $player = $_POST['playername'];
        $password = $_POST['password'];
        $role = "";
        $id = "";

        $playerList = $this->PlayersModel->getAllPlayers();

        $playerResults = array();
        foreach ($playerList as $p) {
            $playerResults[] = $p;
        }

        foreach ($playerResults as $p) {
            echo $p["Player"];
            //if ($p["Player"] == $player && password_verify($password, $p["Password"])) {
            if ($p["Player"] == $player) {
                $role = $p["Role"];
                $id = $p["ID"];

                $this->session->set_userdata('playername', $_POST['playername']);
                //$this->session->set_userdata('role', $role);
                //$this->session->set_userdata('id', $id);
                redirect("/player-portfolio/$player");
            } else {
                echo "you broke it";
            }
        }
    }
}