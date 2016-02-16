<?php

class Player_Portfolio extends MY_Controller {
    function __construct()
    {
        parent::__construct();
    }

    function index() {
        $this->data['pagetitle'] = 'Player Portfolio';
        $this->data['pagebody'] = 'player_portfolio';
        $this->render();
    }
}