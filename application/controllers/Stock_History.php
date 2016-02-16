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

    function index() {
        $this->data['pagetitle'] = 'Stock History';
        $this->data['pagebody'] = 'stock_history';
        $this->render();
    }
}