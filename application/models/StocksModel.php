<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model to get data from the stockticker database.
 */
class StocksModel extends CI_Model {
    /**
     * Constructor.
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * Gets the player table.
     */
    function getPlayers() {
        $this->db->select('*');
        $this->db->from('players');
        $query=$this->db->get();

        return $query->result_array();
    }

    /**
     * Gets the stocks table.
     */
    function getStocks() {
        $this->db->select('*');
        $this->db->from('stocks');
        $query=$this->db->get();

        return $query->result_array();
    }
}
