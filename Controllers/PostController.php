<?php

// Declare the namespace for the class
namespace App\Controllers;

// Include the required model classes
require_once 'Models/PostModel.php';
require_once 'Models/CommentModel.php';
require_once 'Models/LikeModel.php';
require_once 'Models/LogsModel.php';

use App\Models\CommentModel;
use App\Models\PostModel;
use App\Models\LikeModel;
use App\Models\LogsModel;

class PostController
{
    protected $postModel;
    protected $commentModel;
    protected $likeModel;
    protected $logsModel;

    // Constructor method
    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->commentModel = new CommentModel();
        $this->likeModel = new LikeModel();
        $this->logsModel = new LogsModel();
    }

    // Method for getting the index page
    public function getIndex()
    {
        $posts = $this->postModel->getAll();
        require_once 'Views/post/index.php';
    }

    // Method for creating a post
    public function postCreate()
    {
        $post = $_POST;
        $user = $_SESSION;
        if (isset($_FILES['file']) && $_FILES['file']['error'] != 4) {
            $tmpName = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));
            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            $uniqueName = uniqid('', true);
            $file = $uniqueName . "." . $extension;
            if (in_array($extension, $extensions)) {
                move_uploaded_file($tmpName, './upload/' . $file);
                $this->postModel->create($post, $user, $file);
                $this->logsModel->create("L'utilisateur ".$user['pseudo_user']." a écris un post");
                header('Location: ../post/index');
            } else {
                echo "Mauvaise extension";
            };
        } else {
            $file = null;
            $this->postModel->create($post, $user, $file);
            $this->logsModel->create("L'utilisateur ".$user['pseudo_user']." a écris un post");
            header('Location: ../post/index');
        }
    }

    // Method for getting the detail page of a post
    public function getDetail($id)
    {
        $post = $this->postModel->getById($id);
        $comments = $this->commentModel->getCommentsPost($id);
        $com_comments = $this->commentModel->getCommentsCom($id);
        $like_post = $this->likeModel->nbLikePost($id);
        $like_comments = $this->likeModel->nbLikeComment($id);
        $user = $_SESSION;
        $has_like = $this->likeModel->hasLike($user['id_user'], $id);
        $likes = $this->likeModel->allLike();
        require_once 'Views/post/detail.php';
    }

     // Method for getting the update page of a post
    public function getUpdate($id)
    {
        $post = $this->postModel->getById($id);
        require_once 'Views/post/updatePost.php';
    }

    // Method for updating a post
    public function postUpdate($id)
    {
        $post = $_POST;
        $this->postModel->update($id, $post);
        $this->logsModel->create("Le post ".$id." a été modifié");
        header('Location:../../post/index');
    }

    // Method for deleting a post
    public function getDelete($id_post)
    {
        $this->postModel->delete($id_post);
        $this->logsModel->create("Le post ".$id_post." a été supprimé");
        header('Location:../../post/index');
    }

    // Method for getting the list of posts for a user
    public function getList($pseudo_user)
    {
        $posts = $this->postModel->getList($pseudo_user);
        require_once 'Views/post/listPost.php';
    }
}
