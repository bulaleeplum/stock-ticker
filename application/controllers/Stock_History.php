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
     * Generates the default stock history page with
     */
    function index() {
        $this->load->library('table');

        $this->data['pagetitle'] = 'Stock History';
        $this->data['pagebody'] = 'stock_history';
        $this->data['stocks'] = $this->generateDropdown();
        $mostRecent = $this->StockHistory->getMostRecentStock();
        $stockHistory = $this->StockHistory->getStockHistory($mostRecent[0]['code']);
        $this->data['table'] = $this->generateTable($stockHistory);

        $this->render();
    }

    /**
     * Displays a given stock history information into the table
     * @param $stock The stock to display the history about
     */
    function displayStock($stock) {
        $this->load->library('table');
        $this->data['pagetitle'] = 'Stock History';
        $this->data['pagebody'] = 'stock_history';
        $this->data['stocks'] = $this->generateDropdown();
        $stockHistory = $this->StockHistory->getStockHistory($stock);
        $this->data['table'] = $this->generateTable($stockHistory);

        $this->render();
    }

    /**
     * Routing function for the specific stock
     */
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
        //sets the table style
        $template = array('table_open' => '<table class="highlight">');
        $this->table->set_template($template);

        $this->table->set_heading('Code', 'Date', 'Stock Movement',
            'Quantity', 'Transaction');
        foreach ($stock as $row) {
            $this->table->add_row($row);
        }

        return $this->table->generate();
    }

    /**
     * Generates the drop down of stock values
     * @return string The html dropdown
     */
    function generateDropdown() {
        $options = "";
        $stocks = $this->StockHistory->getStocks();
        foreach ($stocks as $row) {
            echo $row['code'];
            $options .= "<option value=" . $row['code'] . ">" . $row['name'] .
                "</option>";
        }
        return $options;
    }
}