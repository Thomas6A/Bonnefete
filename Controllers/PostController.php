<?php

namespace App\Controllers;
require_once 'Models/PostModel.php';

use App\Models\PostModel;

class PostController
{
    protected $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function getIndex(){
        $posts = $this->postModel->getAll();
        require_once 'Views/post/index.php';
    }

    public function postCreate(){
        $post = $_POST;
        $user = $_SESSION;
        $this->postModel->create($post,$user);
        header('Location: ../post/index');
    }
    
}