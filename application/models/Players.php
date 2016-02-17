<?php
/**
 * Players table.
 */
class Images extends CI_Model {
    // Constructor
    function __construct()
    {
        parent::__construct();
    }
    function getPlayers()
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('players');
        return $query->result_array();
    }
}