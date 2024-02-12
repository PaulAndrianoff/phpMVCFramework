<?php
namespace app\helpers;

class ModelHelper {
    protected static $modelMapping = [
        'users' => \app\models\User::class,
        'posts' => \app\models\Post::class,
        'categories' => \app\models\Categorie::class,
        'documents' => \app\models\Document::class,
    ];

    public static function getDatas($tableName) {
        if (!isset(self::$modelMapping[$tableName])) {
            throw new \Exception("Model for '{$tableName}' not found.");
        }

        $modelClass = self::$modelMapping[$tableName];
        $model = new $modelClass();
        return $model->findAll();
    }

    public static function getModel($tableName) {
        if (!isset(self::$modelMapping[$tableName])) {
            throw new \Exception("Model for '{$tableName}' not found.");
        }

        $modelClass = self::$modelMapping[$tableName];
        return new $modelClass();
    }
}