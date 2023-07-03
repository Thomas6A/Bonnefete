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

    public function getUpdate($id){
        $comment = $this->commentModel->getById($id);
        require_once 'Views/comment/updateComment.php';
    }

    public function postUpdate($id_comment,$id_post){
        $comment = $_POST;
        $this->commentModel->update($id_comment, $comment);
        header('Location: http://localhost/bonnefete/post/detail/'.$id_post);
    }

    public function getDelete($id_comment,$id_post){
        $this->commentModel->delete($id_comment);
        header('Location: http://localhost/bonnefete/post/detail/'.$id_post);
    }
}