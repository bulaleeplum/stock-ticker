<?php

class Player_Portfolio extends MY_Controller {
    function __construct()
    {
        parent::__construct();
    }

    function index() {
        $this->load->model('StocksModel');

        $players = $this->StocksModel->getPlayers();
        foreach ($players as $row) {
            echo $row['Player'];
            echo $row['Cash'];
        }

        $this->data['pagetitle'] = 'Player Portfolio';
        $this->data['pagebody'] = 'player_portfolio';
        $this->data['players'] = $players;
        $this->render();
    }
}