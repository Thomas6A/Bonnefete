<?php

namespace App\Controllers;
require_once 'Models/LikeModel.php';

use App\Models\LikeModel;

class LikeController
{
    protected $likeModel;

    public function __construct()
    {
        $this->likeModel = new LikeModel();
    }

    public function getLikePost($id_post){
        $user = $_SESSION;
        $this->likeModel->createPost($user,$id_post);
        header('Location: http://localhost/bonnefete/post/detail/'.$id_post);
    }

    public function getLikeComment($id_comment,$id_post){
        $user = $_SESSION;
        $this->likeModel->createComment($user,$id_comment);
        header('Location: http://localhost/bonnefete/post/detail/'.$id_post);
    }

    public function getDelete($id_post){
        $user = $_SESSION;
        $this->likeModel->delete($user['id_user'],$id_post);
        header('Location: http://localhost/bonnefete/post/detail/'.$id_post);
    }

    public function getDeleteComment($id_comment,$id_post){
        $user = $_SESSION;
        $this->likeModel->deleteComment($user['id_user'],$id_comment);
        header('Location: http://localhost/bonnefete/post/detail/'.$id_post);
    }
}