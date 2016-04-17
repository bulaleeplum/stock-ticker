<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Play extends MY_Controller {

    function __construct() {
        parent::__construct();
    }
    /**
     * Generates homepage and grabs all stocks and players.
     */
    function index() {
        $this->data['pagetitle'] = 'Play';
        $this->data['pagebody'] = 'play';

        $this->render();
    }

}
