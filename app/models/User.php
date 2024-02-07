<?php
namespace app\models;

use core\Model;

/**
 * Represents a user of the application.
 */
class User extends Model {
    protected $table = 'users';

    private $form = [
        'username' => ['type' => 'text', 'maxLen' => 100, 'empty' => false, 'unique' => true, 'validator' => '/^[a-z0-9]+$/i'],
        'email' => ['type' => 'text', 'maxLen' => 255, 'empty' => false, 'unique' => true, 'validator' => '/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/i'],
        'password' => ['type' => 'password', 'maxLen' => 255, 'empty' => false, 'unique' => false, 'validator' => '/^[a-z0-9@;#!$.]{8,}$/i'],
    ];

    private $display = [
        'username' => ['type' => 'text'],
        'email' => ['type' => 'text'],
        'password' => ['type' => 'password'],
        'role' => ['type' => 'text'],
    ];

    public function getForm () {
        return $this->form;
    }

    public function getDisplay () {
        return $this->display;
    }
}
