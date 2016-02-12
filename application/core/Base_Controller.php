<?php

/**
 * core/Base_Controller.php
 *
 * Default application controller.
 *
 * Master view tempate providing the overall webpage layout and placeholders
 * for the content on the page.
 * -------------------------------------------------------------------------
 */
class Base_Controller extends CI_Controller {

	protected $data = array();	  // parameters for view components
	protected $id;				  // identifier for our content
    protected $choices = array(		// our menu navbar
    	// navbar w/ login button (if not logged in)
		// username and logbout button (if logged in)
    'Home' => '/', 'Stock History' => '/stock-history', 'Player Profile' => '/player-profile'
	);

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct()
	{
        parent::__construct();
        $this->data = array();
        $this->data['pagetitle'] = 'Stock Ticker';
        $this->load->library('parser');
	}

	/**
	 * Render this page
	 */
	function render()
	{
		// TODO: change variable names
		$this->data['menubar'] = build_menu_bar($this->choices);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['data'] = &$this->data;
        $this->parser->parse('_template', $this->data);
	}
}

/* End of file Base_Controller.php */
/* Location: application/core/Base_Controller.php */