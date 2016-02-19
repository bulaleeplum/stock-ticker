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

    /**
     * Retrieve the stock history of a given stock
     * @param $stockCode The code name for the stock to retrieve from the
     * database
     * @return mixed The array of results from the query
     */
    function getStockHistory($stockCode) {
        $this->db->select('stocks.Code, movements.DateTime, movements.Action,
                            transactions.Quantity, transactions.Trans');
        $this->db->from('stocks');
        $this->db->join('movements', 'stocks.code = movements.code');
        $this->db->join('transactions', 'movements.code = transactions.stock');
        $this->db->where('stocks.code = ', $stockCode);
        $query = $this->db->get();

        return $query->result_array();
    }

    /**
     * Retrieve the all the stock names and their codes in the database
     * @return mixed The array of names and codes.
     */
    function getStockNamesAndCodes() {
        $this->db->select('stocks.Name, stocks.Code');
        $this->db->from('stocks');

        $query = $this->db->get();

        return $query->result_array();
    }

    /**
     * Retrieves the most recently traded stock code
     * @return mixed The most recently traded stock code
     */
    function getMostRecentStock() {
        $this->db->select('code');
        $this->db->from('movements');
        $this->db->where('datetime = (SELECT MAX(datetime) FROM movements)',
            NULL, FALSE);

        $query = $this->db->get();

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
