<?php
namespace core;

class Controller {
    protected function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    protected function view($view, $data = []) {
        $configData = ['config' => Config::getAll()];
        $session = ['session' => $_SESSION];
        $data = array_merge($data, $configData, $session);
        extract($data);

        require_once __DIR__ . '/../app/views/' . $view . '.php';
    }
}
