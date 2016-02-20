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
        $this->load->model("PortfolioModel");
        $player = $_POST['playername'];

        $this->load->model("PortfolioModel");
        $playerList = $this->PortfolioModel->getPlayers();

        $playerResults = array();
        foreach ($playerList as $p) {
            $playerResults[] = $p;
        }

        foreach ($playerResults as $p) {
            if ($p["Player"] == $_POST['playername']) {
                $this->session->set_userdata('playername', $_POST['playername']);
            }
        }

        redirect("/player-portfolio/$player");
    }
}