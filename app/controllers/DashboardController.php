<?php
namespace app\controllers;

use core\Controller;

class DashboardController extends Controller {
    public function index() {
        $this->view('dashboard/index', []);
    }
}
