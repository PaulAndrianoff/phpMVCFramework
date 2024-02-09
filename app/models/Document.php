<?php
namespace app\models;

use core\Model;

/**
 * Represents a user of the application.
 */
class Document extends Model {
    protected $table = 'documents';

    private $form = [
        'title' => ['type' => 'text', 'display' => true, 'validator' => '/^[a-z0-9!?&éèçàù^:,()\s]+$/i'],
        'path' => ['type' => 'file', 'display' => true, 'validator' => '/^[a-z0-9\/\.:]+$/i'],
        'type' => ['type' => 'text', 'display' => true, 'validator' => '/^[a-z0-9]+$/i'],
        'updated_at' => ['type' => 'date', 'display' => false, 'validator' => ''],
    ];

    private $display = [];

    public function getForm () {
        return $this->form;
    }

    public function getDisplay () {
        return $this->display;
    }
}
