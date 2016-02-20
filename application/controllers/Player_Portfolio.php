<?php
/**
 * The player portfolio page shows the recent trading activity and current
 * holdings for a specific player, with a dropdown to select any other player.
 * Trading activity includes purchases and sales that your app brokered.
 * Current holdings shows the quantity held for each stock on the BSX. If no
 * player is specified, then the page shows the portfolio of the currently
 * logged in user.
 */
class Player_Portfolio extends MY_Controller {
    function __construct() {
        parent::__construct();
    }

    /**
     * Index page for this controller.
     */
    function index() {
        $this->data['pagetitle'] = 'Player Portfolio';
        $this->data['pagebody'] = 'player_portfolio';
        $this->loadPlayerNamesToOptions();

        $this->data['trading_activity'] = NULL;
        $this->data['holdings'] = NULL;

        $this->render();
    }

    /**
     * Query the PortfolioModel Players table. Set each player row as a dropdown option.
     */
    function loadPlayerNamesToOptions() {
        $options = "";
        $players = $this->PortfolioModel->getPlayers();
        foreach ($players as $row) {
            $options .= "<option value=" . $row['Player'] . ">" . $row['Player'] . "</option>";
        }
        $this->data['options'] = $options;
    }

    /**
     * Routing function for the specific player
     */
    function getSpecificPortfolio() {
        $player = $this->input->get('portfolio-select');
        redirect("player-portfolio/$player");
    }

    /**
     * Displays a given portfolio with tables of trading activity and current holdings
     * @param $player the portfolio player
     */
    function displayPortfolio($player) {
        $this->data['pagetitle'] = $player;
        $this->data['pagebody'] = 'player_portfolio';
        $this->loadPlayerNamesToOptions();

        $tradingActivity = $this->PortfolioModel->getTradingActivity($player);
        $this->data['trading_activity'] = $this->generateTradingActivityTable($tradingActivity);

        $currentHoldings = $this->PortfolioModel->getCurrentHoldings($player);
        $this->data['holdings'] = $this->generateCurrentHoldingsTable($currentHoldings);

        $this->render();
    }

    /**
     * Generates the trading activity table with a given player
     * @param $player the portfolio player
     * @return mixed The generated table
     */
    function generateTradingActivityTable($player) {
        //sets the table style
        $template = array('table_open' => '<table class="bordered highlight centered portfolio">');
        $this->table->set_template($template);
        $this->table->set_heading('Stock Code', 'Transaction', 'Date');
        foreach ($player as $row) {
            $this->table->add_row($row);
        }

        return $this->table->generate();
    }

    /**
     * Generates the current holdings table with a given player
     * @param $player the portfolio player
     * @return mixed The generated table
     */
    function generateCurrentHoldingsTable($player) {
        //sets the table style
        $template = array('table_open' => '<table class="bordered highlight centered portfolio">');
        $this->table->set_template($template);
        $this->table->set_heading('Stock Code','Cash', 'Date');
        foreach ($player as $row) {
            $this->table->add_row($row);
        }

        return $this->table->generate();
    }
}