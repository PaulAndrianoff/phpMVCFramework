<?php
namespace app\controllers;

use core\Controller;
use core\Config;
use app\helpers\FormHelper;
use app\helpers\UrlHelper;

class DashboardController extends Controller {
    protected $modelMapping = [
        'users' => \app\models\User::class,
    ];

    public function index() {
        $this->view('dashboard/index', ['data' => $this->modelMapping]);
    }

    public function editTable($params) {
        if (!array_key_exists($params['table'], $this->modelMapping)) {
            UrlHelper::handleNotFound();
        }

        $modelClass = $this->modelMapping[$params['table']];
        $model = new $modelClass();

        $data = $model->findAll();

        $this->view('dashboard/edit', ['data' => $data, 'table' => $params['table'], 'model' => $model->getDisplay()]);
    }

    public function editItem($params) {
        if (!array_key_exists($params['table'], $this->modelMapping) || !preg_match('/^[0-9]+$/', $params['id'])) {
            UrlHelper::handleNotFound();
        }

        $modelClass = $this->modelMapping[$params['table']];
        $model = new $modelClass();

        if ([] !== $_POST) {
            $this->formError = FormHelper::verify($_POST, $model->getForm());
            if (0 === count($this->formError)) {
                $form = FormHelper::clean($_POST);
                $model->update($params['id'], $form);
                UrlHelper::to(Config::get('app.base_url') . 'dashboard/edit/' . $params['table']);
            }
        }

        $data = $model->find($params['id']);

        $this->view('dashboard/editItem', ['data' => $data, 'table' => $params['table'], 'model' => $model->getForm(), 'errors' => $this->formError ?? []]);
    }

    public function newItem($params) {
        if (!array_key_exists($params['table'], $this->modelMapping)) {
            UrlHelper::handleNotFound();
        }

        $modelClass = $this->modelMapping[$params['table']];
        $model = new $modelClass();

        if ([] !== $_POST) {
            $this->formError = FormHelper::verify($_POST, $model->getForm());
            if (0 === count($this->formError)) {
                $form = FormHelper::clean($_POST);
                $model->create($form);
                UrlHelper::to(Config::get('app.base_url') . 'dashboard/edit/' . $params['table']);
            }
        }

        $this->view('dashboard/editItem', ['data' => [], 'table' => $params['table'], 'model' => $model->getForm(), 'errors' => $this->formError ?? []]);
    }

    public function deleteItem($params) {
        if (!array_key_exists($params['table'], $this->modelMapping) || !preg_match('/^[0-9]+$/', $params['id'])) {
            UrlHelper::handleNotFound();
        }

        $modelClass = $this->modelMapping[$params['table']];
        $model = new $modelClass();

        $model->delete($params['id']);

        UrlHelper::to(Config::get('app.base_url') . 'dashboard/edit/' . $params['table']);
    }
}
