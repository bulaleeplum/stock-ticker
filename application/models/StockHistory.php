<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Model to get data from the stockticker database.
 */
class StockHistory extends CI_Model {
    /**
     * Constructor.
     */
    function __construct() {
        parent::__construct();
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
     * Gets the stocks code and name values
     */
    function getStocks() {
        $this->db->select('code, name, value');
        $this->db->from('stocks');
        $query=$this->db->get();
        return $query->result_array();
    }

    /**
     * @param $table: The table to clear and insert data into
     * @param $data: The data to insert to the table.
     */
    function insertData($table, $data) {
        $this->db->empty_table($table);
        $this->db->insert_batch($table, $data);
    }

}
