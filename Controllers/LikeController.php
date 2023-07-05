<?php

// Declare the namespace for the class
namespace App\Controllers;


// Include the LikeModel class file
require_once 'Models/LikeModel.php';

use App\Models\LikeModel; // Import the LikeModel class

class LikeController
{
    protected $likeModel; // Property to hold an instance of LikeModel

    // Constructor method
    public function __construct()
    {
        $this->likeModel = new LikeModel();
    }

    // Method for liking a post
    public function getLikePost($id_post){
        $user = $_SESSION;
        $this->likeModel->createPost($user,$id_post);
        header('Location: http://localhost/bonnefete/post/detail/'.$id_post);
    }

    // Method for liking a comment
    public function getLikeComment($id_comment,$id_post){
        $user = $_SESSION;
        $this->likeModel->createComment($user,$id_comment);
        header('Location: http://localhost/bonnefete/post/detail/'.$id_post);
    }

    // Method for unliking a post
    public function getDelete($id_post){
        $user = $_SESSION;
        $this->likeModel->delete($user['id_user'],$id_post);
        header('Location: http://localhost/bonnefete/post/detail/'.$id_post);
    }

    // Method for unliking a comment
    public function getDeleteComment($id_comment,$id_post){
        $user = $_SESSION;
        $this->likeModel->deleteComment($user['id_user'],$id_comment);
        header('Location: http://localhost/bonnefete/post/detail/'.$id_post);
    }
}