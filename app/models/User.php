<?php
namespace app\models;

use core\Model;

/**
 * Represents a user of the application.
 */
class User extends Model {
    protected $table = 'users';

    private $form = [
        'username' => ['type' => 'text', 'display' => true, 'validator' => '/^[a-z0-9]+$/i'],
        'email' => ['type' => 'text', 'display' => true, 'validator' => '/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/i'],
        'password' => ['type' => 'password', 'display' => true, 'validator' => '/^[a-z0-9@;#!$.]{8,}$/i'],
        'active' => ['type' => 'number', 'min' => 0, 'max' => 1, 'display' => true, 'validator' => '/^(0|1)$/i'],
    ];

    private $display = [];

    public function getForm () {
        return $this->form;
    }

    public function getDisplay () {
        return $this->display;
    }
}
