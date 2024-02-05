<?php
namespace app\controllers;

use core\Controller;

use DateTime;

use app\helpers\FormHelper;
use app\helpers\SessionHelper;
use app\helpers\UrlHelper;
use app\models\User;

use app\helpers\DebugHelper;

class AccountController extends Controller {
    public function login() {
        $this->redirectIfLogged();

        if ([] !== $_POST) {
            $form = FormHelper::clean($_POST);

            $userModel = new User();
            $user = $userModel->findBy($form);

            if (1 === count($user)) {
                SessionHelper::set('user_id', $user[0]['id']);
                SessionHelper::set('username', $user[0]['username']);
                SessionHelper::set('time', new DateTime());
                SessionHelper::set('role', $user[0]['role']);

                UrlHelper::to('dashboard');
            }
        }
        $this->view('account/login', []);
    }
    
    public function register() {
        $this->redirectIfLogged();

        if ([] !== $_POST) {
            $form = FormHelper::clean($_POST);

            $userModel = new User();
            $userModel->create($form);

            UrlHelper::to('login');
        }
        $this->view('account/register', []);
    }
    
    public function logOut() {
        SessionHelper::delete('user_id');
        SessionHelper::delete('username');
        SessionHelper::delete('time');
        SessionHelper::delete('role');

        UrlHelper::to('login');
    }

    private function redirectIfLogged () {
        if (SessionHelper::isAuthenticated()) {
            UrlHelper::to('dashboard');
        }
    }
}
