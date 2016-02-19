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
	function __construct()
	{
        parent::__construct();
        $this->data = array();
        $this->data['title'] = 'Stock Ticker'; 		// default title
        $this->data['pagetitle'] = 'Stock Ticker'; 	// default page
        $this->load->library('parser');
	}

	/**
	 * Render this page
	 */
	function render()
	{

        // laod in header and footer
        $this->data['header'] = $this->parser->parse('base/_header', $this->data, true);
        $this->data['footer'] = $this->parser->parse('base/_footer', $this->data, true);

        // load in the page content
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['data'] = &$this->data;

        // load the template
        $this->parser->parse('base/_template', $this->data);
	}
}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */