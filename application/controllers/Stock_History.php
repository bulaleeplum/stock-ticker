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

    /*
     * Display screen contents
     */
    function index() {
        $this->load->model('StocksModel');
        $this->load->library('table');

        $this->data['pagetitle'] = 'Stock History';
        $this->data['pagebody'] = 'stock_history';
        $value = $this->input->post('stock_select');

        $this->table->set_heading('Code', 'Date', 'Stock Movement',
            'Quantity', 'Transaction');

        if(!empty($value)) {
            $action = $this->StocksModel->getStockHistory($value);
            foreach ($action as $row) {
                $this->table->add_row($row);
            }
        }
        $this->data['table'] = $this->table->generate();
        $this->render();
    }
}