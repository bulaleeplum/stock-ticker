<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller.
 *
 * Master view tempate providing the overall webpage layout and placeholders
 * for the content on the page.
 * -------------------------------------------------------------------------
 */
if(!defined('SERVER_BACKUP')) define('SERVER_BACKUP', ('http://www.comp4711bsx//.local/'));
if(!defined('SERVER')) define('SERVER', ('http://bsx.jlparry.com/'));
if(!defined('TEAM')) define('TEAM', ('O02'));
class MY_Controller extends CI_Controller {

	protected $data = array();	  // parameters for view components
	protected $id;				  // identifier for our content
	protected $choices = array(
		'Home' => '/', 'Stock History' => '/stock-history', 'Player Portfolio' => '/player-portfolio'
	);

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */
	function __construct() {
        parent::__construct();
        $this->data = array();
        $this->data['title'] = 'Stock Ticker'; 		// default title
        $this->data['pagetitle'] = 'Stock Ticker'; 	// default page
        $this->load->library('parser');


        $this->load->model("PortfolioModel");
        $players = $this->PortfolioModel->getPlayers();

        $playerList = array();

        foreach($players as $player) {
            $playerList[] = $player;
        }

        $this->data['playerList'] = $playerList;
        $session_id = $this->session->userdata('playername');
        if ($session_id) {
            $this->data['username'] = $session_id;
        }
	}

	/**
	 * Render this page
	 */
	function render() {

        // check logged in status to choose appropriate heading
        if (isset($this->data['username'])) {
            $this->data['logged_in_status'] = $this->parser->parse('base/_header-loggedin', $this->data, true);
        } else {
            $this->data['logged_in_status'] = $this->parser->parse('base/_header-loggedout', $this->data, true);
        }

        // load in header and footer
        $this->data['header'] = $this->parser->parse('base/_header', $this->data, true);
        $this->data['footer'] = $this->parser->parse('base/_footer', $this->data, true);

        // load in the page content
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['data'] = $this->data;

        // load the template
        $this->parser->parse('base/_template', $this->data);
	}

    /**
     * @param $filename: Address to the server file
     * @return string the server data as an array
     */
    protected function importCSV2Array($filename) {
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

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */