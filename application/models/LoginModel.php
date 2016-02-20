<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model to get log a user in.
 */
class LoginModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Finds a user in the players table.
     * @param $name the user name
     * @return player data
     */
    function login($name) {
        $this->db->select('players.Player');
        $this->db->from('players');
        $this->db->where('players.Player', $name);

        return $this->db->get();
    }
}
