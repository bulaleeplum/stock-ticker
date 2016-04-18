<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model to get data from the stockticker database.
 */
class PlayModel extends CI_Model {
    /**
     * Constructor.
     */
    function __construct() {
        parent::__construct();
    }

    function getPlayerCash($player) {
        $this->load->database();
        $this->db->select('players.Cash');
        $this->db->from('players');
        $this->db->where('players.Player = ', $player);
        $query = $this->db->get();

        return $query->row()->Cash;
    }
}