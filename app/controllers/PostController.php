<?php
namespace app\controllers;

use core\Controller;
use app\helpers\UrlHelper;
use app\models\Post;

class PostController extends Controller {
    public function index() {
        $postModel = new Post();
        $posts = $postModel->findAll();
        $this->view('post/index', ['posts' => $posts]);
    }

    public function searchById($params) {
        $id = $params['id'] ?? null;
        if ($id) {
            $postModel = new Post();
            $post = $postModel->find($id);
            if ($post) {
                $this->view('post/searchById', ['post' => $post]);
            } else {
                UrlHelper::handleNotFound();
            }
        } else {
            UrlHelper::handleNotFound();
        }
    }
}
