<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

 	function __construct() {
        parent::__construct();
    }

    function index() {
        $this->data['pagetitle'] = 'Home';
		$this->data['pagebody'] = 'home';

        $this->load->model("HomeModel");
        $this->load->model("StockHistory");
        $this->load->model("PortfolioModel");

        $stocks = $this->StockHistory->getStocks();
        $players = $this->PortfolioModel->getPlayers();

        $stockList = array();
        $playerList = array();

        foreach($stocks as $stock) {
            $stockList[] = $stock;
        }

        foreach($players as $player) {

            $equity = $this->HomeModel->getPlayerEquity($player["Player"]);
            $player["equity"] = $equity[0]["equity"];
            $playerList[] = $player;
        }

        $this->data['stockList'] = $stockList;
        $this->data['playerList'] = $playerList;

    	$this->render();
    }

      /**
     * Load the equity for the porfolio selected.
     */
    function loadEquity() {
        $selectedPortfolio = $this->input->post('portfolio-select');
        $result = 0;

        if (!empty($selectedPortfolio)) {
            $equity = $this->PortfolioModel->getPlayerEquity($selectedPortfolio);
            $result = $equity[0]['equity'];
        }

         $this->data['equity'] = $result;
    }

    /**
     * Load the net worth for the portfolio selected.
     */
    function loadNetWorth() {
        $selectedPortfolio = $this->input->post('portfolio-select');
        $result = 0;

        if (!empty($selectedPortfolio)) {
            $netWorth = $this->PortfolioModel->getPlayerNetWorth($selectedPortfolio);
            $result = $netWorth[0]['netWorth'];
        }

        $this->data['netWorth'] = $result;
    }
}
