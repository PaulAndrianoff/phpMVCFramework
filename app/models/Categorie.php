<?php
namespace app\models;

use core\Model;

/**
 * Represents a user of the application.
 */
class Categorie extends Model {
    protected $table = 'categories';

    private $form = [
        'name' => ['type' => 'text', 'display' => true, 'validator' => '/^[a-z0-9!?&éèçàù^:,()\s]+$/i'],
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
