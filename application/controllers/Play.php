<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Play extends MY_Controller {

    function __construct() {
        parent::__construct();
    }
    /**
     * Generates homepage and grabs all stocks and players.
     */
    function index() {
        $this->data['pagetitle'] = 'Play';
        $this->data['pagebody'] = 'play';

        $this->load->model('GameModel');
        $this->load->model('PlayModel');
        $this->token = $this->registerAgent();
        $this->GameModel->getGameData();

        $player = $this->data['username'];
        $tradingActivity = $this->PortfolioModel->getTradingActivity($player);

        $this->data['playercash'] = $this->PlayModel->getPlayerCash($player);
        $playerEquity = $this->HomeModel->getPlayerEquity($player);
        $this->data['playerequity'] = $playerEquity[0]['equity'];
        $this->data['trading_activity'] = $this->generateTradingActivityTable($tradingActivity);

        $this->data['stocks'] = $this->generateDropdown();

        $this->render();
    }

    function makeMove() {
        $stock = $this->input->post('stock_select');
        $amount = $this->input->post('stock_amount');
        $action = $this->input->post('stock_action');
        $player = $this->data['username'];

        if ($action == "buy") {
            $this->buyStock($stock, $player, $amount);
        } else {
            $this->sellStock($stock, $player, $amount, 1234);
        }
        // redirect('/play');
    }

    /**
     * @param $stockCode: Code of the stock to buy
     * @param $player:    Name of the player who is buying
     * @param $quantity   Amount the player wants to buy
     * @return array      Return values from the server as an array. Values
     *                    include: token, stock, agent, player, datetime
     */
    function buyStock($stockCode, $player, $quantity) {
        $url = SERVER . 'buy';
        $data = array('team' => TEAM,
            'token' => $this->token,
            'player' => $player,
            'stock' => $stockCode,
            'quantity' => $quantity);

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        $xmlData = simplexml_load_string($result);
        $contents = array();

        $contents['token']   = (string) $xmlData->token;
        $contents['stock'] = (string) $xmlData->stock;
        $contents['agent']  = (string) $xmlData->agent;
        $contents['player'] = (string) $xmlData->player;
        $contents['datetime'] = (string) $xmlData->datetime;

        return $contents;
    }


    /**
     * UNTESTED FUNCTION selling does not work on his server so this function
     * cannot be tested
     * @param $stockCode:  Code of the stock to buy
     * @param $player:     Name of the player who is buying
     * @param $quantity    Amount the player wants to buy
     * @param $certificate The certificate for that players stock (this can
     *                     be an array)
     */
    function sellStock($stockCode, $player, $quantity, $certificate) {
        $url = SERVER . 'sell';
        $data = array('team' => TEAM,
            'token' => $this->token,
            'player' => $player,
            'stock' => $stockCode,
            'quantity' => $quantity,
            'certificate' => $certificate);

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        var_dump($result);
        /*$xmlData = simplexml_load_string($result);
        $contents = array();

        $contents['token']   = (string) $xmlData->token;
        $contents['stock'] = (string) $xmlData->stock;
        $contents['agent']  = (string) $xmlData->agent;
        $contents['player'] = (string) $xmlData->player;
        $contents['datetime'] = (string) $xmlData->datetime;

        return $contents; */
    }

    /**
     * @return string Our teams token, this is used for buying and selling
     */
    function registerAgent() {
        $url = SERVER . 'register';
        $data = array('team' => TEAM, 'name' => 'Commie Stocks', 'password' =>
            'tuesday');


        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $xmlData = simplexml_load_string($result);
        return (string)$xmlData->token;
    }

    /**
     * Generates the trading activity table with a given player
     * @param $player the portfolio player
     * @return mixed The generated table
     */
    function generateTradingActivityTable($player) {
        $this->table->set_heading('Stock Code', 'Transaction', 'Date');
        foreach ($player as $row) {
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
            $options .= "<option value=" . $row['code'] . ">" . $row['name'] .
                "</option>";
        }
        return $options;
    }
}
