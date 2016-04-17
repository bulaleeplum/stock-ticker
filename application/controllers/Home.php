<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends MY_Controller {
    public $token;
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


        $this->StockHistory->clearGameTables();

        $this->StockHistory->insertData('stocks', $stockData);

        $this->token = $this->registerAgent();

        $test = $this->buyStock("APPL", "Donald", 10);
        $this->sellStock('APPL', 'Donald', 2 ,$test['token']);
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

}
