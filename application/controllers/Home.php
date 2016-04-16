<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('SERVER_BACKUP', ('http://www.comp4711bsx.local/'));
define('SERVER', ('http://bsx.jlparry.com/'));

class Home extends MY_Controller {

 	function __construct() {
        parent::__construct();
    }
    /**
     * Generates homepage and grabs all stocks and players.
     */
    function index() {
        $this->data['pagetitle'] = 'Home';
		$this->data['pagebody'] = 'home';
        $stockData = $this->importCSV2Array
        (SERVER . 'data/stocks', 'r');
        $movementData = $this->importCSV2Array
        (SERVER . 'data/movement', 'r');
        $transactionsData = $this->importCSV2Array
        (SERVER . 'data/transactions', 'r');


        $this->StockHistory->clearGameTables();

        if(!isset($stockData) || !isset($movementData) || !isset($transactionsData)) {
            $this->data['pagebody'] = 'Error loading data';
            return;
        }

        $this->StockHistory->insertData('stocks', $stockData);
        $this->StockHistory->insertData('movements', $movementData);
        $this->StockHistory->insertData('transactions', $transactionsData);

        $this->load->model('GameModel');
        $this->GameModel->getGameData();

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
     * @param $filename: Address to the server file
     * @return string the server data as an array
     */
    private function importCSV2Array($filename) {
        $row = 0;
        $col = 0;
        $handle = @fopen($filename, "r");
        if ($handle) {
            while (($row = fgetcsv($handle, 4096)) !== false) {
                if (empty($fields)) {
                    $fields = $row;
                    continue;
                }

                foreach ($row as $k => $value) {
                    $results[$col][$fields[$k]] = $value;
                }
                $col++;
                unset($row);
            }
            if (!feof($handle)) {
                echo "Error: unexpected fgets() failng";
            }
            fclose($handle);
        } else {
            echo "fopen failed";
        }
        return isset($results) ? $results : "";
    }

}
