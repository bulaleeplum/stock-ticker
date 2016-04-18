<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Registration class to add a new player to the database.
 */
class Register extends MY_Controller {
    function index() {
        $success = true;
        if ($_POST['playername'] == "") {
            $this->data['errorMsg'] = "no name entered";
            $success = false;
        }
        if ($_POST['password'] != $_POST['passwordConfirm']) {
            $success = false;
        }
        if ($success) {
            $this->PlayersModel->registerPlayer($_POST['playername'], password_hash($_POST['password'], PASSWORD_DEFAULT));
            redirect('/');
        }
    }
}