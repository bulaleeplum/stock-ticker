<?php

class PlayersModel extends CI_Model {
    public function __construct()
    {
        parent::__construct('users', 'id');
    }

    function registerPlayer($playername, $password) {
        $this->load->database();
        $userData = array(
            'player' => $playername,
            'password' => $password
        );

        $this->db->insert('players', $userData);
    }

    function getAllPlayers() {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('players');
        $query=$this->db->get();
        return $query->result_array();
    }
}