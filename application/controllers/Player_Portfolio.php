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
        $this->loadCurrentHoldings();
        $this->loadTradingActivity();
        $this->loadEquity();
        $this->loadNetWorth();
        $this->render();
    }

    /**
     * Query the StocksModel Players table. Set each player row as a dropdown option.
     */
    function loadPlayerNamesToOptions() {
        $options = "";
        $players = $this->StocksModel->getPlayers();
        foreach ($players as $row) {
            $options .= "<option value=" . $row['Player'] . ">" . $row['Player'] . "</option>";
        }
        $this->data['options'] = $options;
    }

    /**
     * Load the current holdings table for the portfolio selected
     */
    function loadCurrentHoldings() {
        $this->table->set_heading('Stock Code','Cash', 'Date');
        $selectedPortfolio = $this->input->post('portfolio-select');
        $this->data['playerName'] = $selectedPortfolio;

        if (!empty($selectedPortfolio)) {
            $portfolio = $this->StocksModel->getCurrentHoldings
            ($selectedPortfolio);
            foreach ($portfolio as $row) {
                $this->table->add_row($row);
            }
        }
        $this->data['holdings'] = $this->table->generate();
    }

    /**
     * Load the trading activity table for the portfolio selected.
     */
    function loadTradingActivity() {
        $this->table->set_heading('Stock Code', 'Transaction', 'Date');
        $selectedPortfolio = $this->input->post('portfolio-select');
        $this->data['playerName'] = $selectedPortfolio;

        if (!empty($selectedPortfolio)) {
            $portfolio = $this->StocksModel->getTradingActivity($selectedPortfolio);
            foreach ($portfolio as $row) {
                $this->table->add_row($row);
            }
        }
        $this->data['trading_activity'] = $this->table->generate();
    }

    /**
     * Load the equity for the porfolio selected.
     */
    function loadEquity() {
       $selectedPortfolio = $this->input->post('portfolio-select');
       $equity = $this->StocksModel->getPlayerEquity($selectedPortfolio);
       $this->data['equity'] = $equity[0]['equity'];
    }

    /**
     * Load the net worth for the portfolio selected.
     */
    function loadNetWorth() {
       $selectedPortfolio = $this->input->post('portfolio-select');
       $netWorth = $this->StocksModel->getPlayerNetWorth($selectedPortfolio);
       $this->data['netWorth'] = $netWorth[0]['netWorth'];
    }
}