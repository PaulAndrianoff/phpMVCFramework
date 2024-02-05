<?php
namespace app\controllers;

use core\Controller;

class AccountController extends Controller {
    public function login() {
        // print_r($_POST);
        $this->view('account/login', []);
    }
    
    public function register() {
        // print_r($_POST);
        $this->view('account/register', []);
    }
}
