<?php
namespace app\models;

use core\Model;

/**
 * Represents a user of the application.
 */
class Post extends Model {
    protected $table = 'posts';

    private $form = [
        'category_id' => ['type' => 'number', 'display' => true, 'validator' => '/^[0-9]+$/i'],
        'title' => ['type' => 'text', 'display' => true, 'validator' => '/^[a-z0-9!?&éèçàù^:,()\s]+$/i'],
        'body' => ['type' => 'textarea', 'display' => true, 'validator' => ''],
        'author' => ['type' => 'text', 'display' => false, 'validator' => ''],
        'updated_at' => ['type' => 'date', 'display' => false, 'validator' => ''],
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
