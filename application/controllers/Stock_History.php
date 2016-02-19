<?php
    /**
     * Created by PhpStorm.
     * User: scott
     * Date: 15/02/16
     * Time: 3:07 PM
     */

class Stock_History extends MY_Controller {

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Generates the stock history page values and passes them to the view
     */
    function index() {
        $this->load->library('table');

        $this->data['pagetitle'] = 'Stock History';
        $this->data['pagebody'] = 'stock_history';
        $mostRecent = $this->StockHistory->getMostRecentStock();
        $stockHistory = $this->StockHistory->getStockHistory($mostRecent[0]['code']);
        $this->data['table'] = $this->generateTable($stockHistory);

        $this->render();
    }

    function displayStock($stock) {
        $this->load->library('table');
        $this->data['pagetitle'] = 'Stock History';
        $this->data['pagebody'] = 'stock_history';
        $stockHistory = $this->StockHistory->getStockHistory($stock);
        $this->data['table'] = $this->generateTable($stockHistory);

        $this->render();
    }

    function getSpecificStock() {
        $stock = $this->input->get('stock_select');
        redirect("stock-history/$stock");

    }

    /**
     * Generates the stock history table with a given stock
     * @param $stock The stock to generate the table with
     * @return mixed The generated table
     */
    function generateTable($stock) {
        $this->table->set_heading('Code', 'Date', 'Stock Movement',
            'Quantity', 'Transaction');
        foreach ($stock as $row) {
            $this->table->add_row($row);
        }

        return $this->table->generate();
    }
}