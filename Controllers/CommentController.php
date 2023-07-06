<?php

// Declare the namespace for the class
namespace App\Controllers;

// Include the CommentModel class file
require_once 'Models/CommentModel.php';
require_once 'Models/LogsModel.php';

use App\Models\CommentModel; // Import the CommentModel class
use App\Models\LogsModel;

class CommentController
{
    protected $commentModel; // Property to hold an instance of CommentModel
    protected $logsModel;

    // Constructor method
    public function __construct()
    {
        $this->commentModel = new CommentModel(); // Create a new instance of CommentModel
        $this->logsModel = new LogsModel();
    }

    // Method for creating a new comment for a post
    public function postCreate($id_post){
        $comment = $_POST; 
        $user = $_SESSION;
        $this->commentModel->create($comment,$user,$id_post);
        $this->logsModel->create("L'utilisateur ".$user['pseudo_user']." a écris un commentaire");
        header('Location: http://localhost/bonnefete/post/detail/'.$id_post);
    }

    // Method for creating a comment as a reply to a pre-existing comment
    public function postCreateCom($id_post,$id_precomment){
        $comment = $_POST;
        $user = $_SESSION;
        $this->commentModel->createCom($comment,$user,$id_post,$id_precomment);
        $this->logsModel->create("L'utilisateur ".$user['pseudo_user']." a écris un sous commentaire");
        header('Location: http://localhost/bonnefete/post/detail/'.$id_post);
    }

    // Method for retrieving a comment for updating
    public function getUpdate($id){
        $comment = $this->commentModel->getById($id);
        require_once 'Views/comment/updateComment.php';
    }

    // Method for updating a comment
    public function postUpdate($id_comment,$id_post){
        $comment = $_POST;
        $this->commentModel->update($id_comment, $comment);
        $this->logsModel->create("Le commentaire ".$id_comment." a été modifié");
        header('Location: http://localhost/bonnefete/post/detail/'.$id_post);
    }

    // Method for deleting a comment
    public function getDelete($id_comment,$id_post){
        $this->commentModel->delete($id_comment);
        $this->logsModel->create("Le commentaire ".$id_comment." a été supprimé");
        header('Location: http://localhost/bonnefete/post/detail/'.$id_post);
    }
}