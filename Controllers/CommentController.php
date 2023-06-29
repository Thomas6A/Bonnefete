<?php

namespace App\Controllers;
require_once 'Models/CommentModel.php';

use App\Models\CommentModel;

class CommentController
{
    protected $commentModel;

    public function __construct()
    {
        $this->commentModel = new CommentModel();
    }

    public function postCreate($id_post){
        $comment = $_POST;
        $user = $_SESSION;
        $this->commentModel->create($comment,$user,$id_post);
        header('Location: http://localhost/bonnefete/post/detail/'.$id_post);
    }

    public function postCreateCom($id_post,$id_precomment){
        $comment = $_POST;
        $user = $_SESSION;
        $this->commentModel->createCom($comment,$user,$id_post,$id_precomment);
        header('Location: http://localhost/bonnefete/post/detail/'.$id_post);
    }
}