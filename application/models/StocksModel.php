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
     * Gets the stocks table.
     */
    function getStocks() {
        $this->db->select('*');
        $this->db->from('stocks');
        $query=$this->db->get();

        return $query->result_array();
    }
}
