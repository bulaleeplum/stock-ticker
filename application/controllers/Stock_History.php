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
        $this->load->model('StocksModel');
        $this->load->library('table');

        $this->data['pagetitle'] = 'Stock History';
        $this->data['pagebody'] = 'stock_history';
        $value = $this->input->post('stock_select');

        $table = NULL;
        if(!empty($value)) {
            $stockHistory = $this->StocksModel->getStockHistory($value);
            $table = $this->generateTable($stockHistory);
        } else {
            $mostRecent = $this->StocksModel->getMostRecentStock();
            $stockHistory = $this->StocksModel->getStockHistory($mostRecent[0]['code']);
            $table = $this->generateTable($stockHistory);
        }

        $this->data['table'] = $table;
        $this->render();
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