<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model to get data from the stockticker database.
 */
class PortfolioModel extends CI_Model {
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
     * Retrieves the recent trading activity of a given
     * player.
     * @param $playerName the name of the player to retrieve from the database
     * @return mixed the array of results from the query
     */
    function getTradingActivity($playerName) {
        $this->db->select('Stock, Trans, DateTime');
        $this->db->from('transactions');
        $this->db->where('player = ', $playerName);
        $query = $this->db->get();

        return $query->result_array();
    }

    /**
     * Retrieves the recent trading activity of a given
     * player.
     * @param $playerName the name of the player to retrieve from the database
     * @return mixed the array of results from the query
     */
    function getCurrentHoldings($playerName) {
        $this->db->select('Stock, Quantity, DateTime');
        $this->db->from('transactions');
        $this->db->where('player = ', $playerName);
        $query = $this->db->get();

        return $query->result_array();
    }
}