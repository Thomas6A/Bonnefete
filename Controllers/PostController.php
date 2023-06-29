<?php

namespace App\Controllers;
require_once 'Models/PostModel.php';
require_once 'Models/CommentModel.php';

use App\Models\CommentModel;
use App\Models\PostModel;

class PostController
{
    protected $postModel;
    protected $commentModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->commentModel = new CommentModel();
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

    public function getDetail($id){
        $post = $this->postModel->getById($id);
        $comments = $this->commentModel->getCommentsPost($id);
        $com_comments = $this->commentModel->getCommentsCom($id);
        require_once 'Views/post/detail.php';
    }

    public function getUpdate($id){
        $post = $this->postModel->getById($id);
        require_once 'Views/post/updatePost.php';
    }

    public function postUpdate($id){
        $post = $_POST;
        $this->postModel->update($id, $post);
        header('Location:../../post/index');
    }

    public function getDelete($id_post){
        $this->postModel->delete($id_post);
        header('Location:../../post/index');
    }

    public function getList($pseudo_user){
        $posts = $this->postModel->getList($pseudo_user);
        require_once 'Views/post/listPost.php';
    }
    
}