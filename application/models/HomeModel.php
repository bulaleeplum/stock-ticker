<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model to get data from the stockticker database.
 */
class HomeModel extends CI_Model {
    /**
     * Constructor.
     */
    function __construct() {
        parent::__construct();
    }

      /**
     * Calculates the equity given a player name.
     * A player's equity is the quantity of each stock the hold * the current
     * price of that stock.
     * @param $playerName the name of the player to retrieve from the database
     * @return mixed the array of results from the query
     */
    function getPlayerEquity($playerName) {
        $this->db->select('players.Player,
            (SUM(Collections.StockAmount * stocks.Value)) AS equity');
        $this->db->from('players');
        $this->db->join('Collections', 'players.Player = Collections.Player', 'left');
        $this->db->join('stocks', 'stocks.Code = Collections.Code', 'left');
        $this->db->where('players.Player = ', $playerName);
        $this->db->group_by('players.Player');

        $query = $this->db->get();

        return $query->result_array();
    }

        /**
     * Calculates the net worth given a player name.
     * A player's net worth is their net worth + cash.
     * @param $playerName the name of the player to retrieve from the database
     * @return mixed the array of results from the query
     */
    function getPlayerNetWorth($playerName) {
        $this->db->select('players.Player,
            (SUM(Collections.StockAmount * stocks.Value) + players.cash) AS netWorth');
        $this->db->from('players');
        $this->db->join('Collections', 'players.Player = Collections.Player', 'left');
        $this->db->join('stocks', 'stocks.Code = Collections.Code', 'left');
        $this->db->where('players.Player = ', $playerName);
        $this->db->group_by('players.Player');

        $query = $this->db->get();

        return $query->result_array();
    }
}