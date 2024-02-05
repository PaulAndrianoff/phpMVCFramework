<?php
namespace app\controllers;

use core\Controller;
use app\helpers\UrlHelper;
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
            if ($user) {
                $this->view('users/searchById', ['user' => $user]);
            } else {
                UrlHelper::handleNotFound();
            }
        } else {
            UrlHelper::handleNotFound();
        }
    }
}
