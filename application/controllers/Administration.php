<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Administrator-only functions to manage players
 */
class Administration extends MY_Controller {
    function index() {
        if ($this->session->userdata('role') != ROLE_ADMIN) {
            redirect('/');
        }

        $this->data['pagetitle'] = 'Administration';
        $this->data['pagebody'] = 'administration';
        $this->getUsers();
        $this->render();
    }

    /**
     * Gets all the player names to display in a list
     */
    function getUsers(){
        $playerList = $this->PlayersModel->getAllPlayers();

        $playerResults = array();
        foreach ($playerList as $p) {
            $array = array('playername' => $p['Player']);
            $playerResults[] = $array;
        }
        $this->data['listPlayer'] = $playerResults;
    }

    /**
     * Edit a player's name
     * @param  $playername name of player to edit
     */
    function editPlayer($playername){
        $this->data['pagebody'] = 'edit_player';
        $this->data['playername'] = $playername;
        $this->render();
    }

    /**
     * Delete a player from the database
     * @param  $playername name of player to delete
     */
    function deletePlayer($playername){
        $this->db->where('Player', $playername);
        $this->db->delete('players');
        redirect('/Administration');
    }

    /**
     * Change a player's password
     * @param  $playername name of player to change password for
     */
    function changePassword($playername){
        $newPassword = $_POST['password'];
        $data = array('password' => password_hash($newPassword, PASSWORD_DEFAULT));
        $this->db->where('Player', $playername);
        $this->db->update('players', $data);
        redirect('/Administration');
    }
}