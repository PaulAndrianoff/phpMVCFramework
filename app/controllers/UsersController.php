<?php
namespace app\controllers;

use core\Controller;
use app\models\User;

class UsersController extends Controller {
    public function index() {
        $userModel = new User();
        $users = $userModel->findAll();
        $this->view('users/index', ['users' => $users]);
    }

    public function searchById($params) {
        $id = $params['id'] ?? null;
        if ($id) {
            $userModel = new User();
            $user = $userModel->find($id);
            $this->view('users/searchById', ['user' => $user]);
        } else {
            // Handle error or invalid input
        }
    }
}
