<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
 	function __construct()
    {
        parent::__construct();
    }

    function index() {
        $this->data['pagetitle'] = 'Home';
		$this->data['pagebody'] = 'home';
        $this->loadEquity();
        $this->loadNetWorth();
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
