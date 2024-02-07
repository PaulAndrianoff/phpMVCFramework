<?php
namespace app\controllers;

use core\Controller;
use app\models\Post;
use app\helpers\DebugHelper;

class HomeController extends Controller {
    public function index() {
        $posts = new Post();
        $this->view('home/index', ['data' => $posts->findAll()]);
    }
}
