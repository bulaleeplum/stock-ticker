<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
            $this->PlayersModel->addUser($_POST['Player'], password_hash(($_POST['Password']), PASSWORD_DEFAULT));
        }
        redirect('/player-portfolio');
    }
}