<?php

namespace App\Models;
require_once 'Database.php';
require_once 'Models/Comment.php';
use App\Database;

use PDO;

class CommentModel
{
    private $connection;

    public function __construct(){
        $this->connection = new Database();
    }

    public function getCommentsPost($id_post){
        $query = $this->connection->getPdo()->prepare("SELECT id_comment,content_comment,date_comment,pseudo_user FROM comment inner join post on post.id_post = comment.id_post inner join user on post.id_user = user.id_user where post.id_post = :id_post and comment.id_precomment is null");
        $query->execute([
            'id_post' => $id_post
        ]);
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Comment");
    }

    public function create($content, $user, $id_post){
        $query = $this->connection->getPdo()->prepare('INSERT INTO comment (content_comment,date_comment,id_user,id_post) VALUES (:content_comment, now(), :id_user, :id_post)');
        $query->execute([
            'content_comment' => $content['content_comment'],
            'id_user' => $user['id_user'],
            'id_post' => $id_post
        ]);
    }

    public function getCommentsCom($id_post){
        $query = $this->connection->getPdo()->prepare("SELECT id_comment,content_comment,date_comment,pseudo_user,id_precomment FROM comment inner join post on post.id_post = comment.id_post inner join user on post.id_user = user.id_user where post.id_post = :id_post and comment.id_precomment is not null");
        $query->execute([
            'id_post' => $id_post
        ]);
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Comment");
    }

    public function createCom($content, $user, $id_post, $id_comment){
        $query = $this->connection->getPdo()->prepare('INSERT INTO comment (content_comment,date_comment,id_precomment,id_user,id_post) VALUES (:content_comment, now(), :id_precomment, :id_user, :id_post)');
        $query->execute([
            'content_comment' => $content['content_comment'],
            'id_precomment' => $id_comment,
            'id_user' => $user['id_user'],
            'id_post' => $id_post
        ]);
    }

    public function getById($id){
        $query = $this->connection->getPdo()->prepare('SELECT id_comment,content_comment,date_comment,pseudo_user,id_post FROM comment inner join user on comment.id_user = user.id_user WHERE id_comment = :id_comment');
        $query->execute([
            'id_comment' => $id
        ]);
        $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\Comment");
        return $query->fetch();
    }

    public function update($id_comment, $comment){
        $query = $this->connection->getPdo()->prepare('update comment set content_comment = :content_comment where id_comment = :id_comment');
        $query->execute([
            'id_comment' => $id_comment,
            'content_comment' => $comment['content_post']
        ]);

    }

    public function delete($id_comment){
        $query = $this->connection->getPdo()->prepare('DELETE FROM comment WHERE id_comment = :id_comment');
        $query ->execute([
            'id_comment' => $id_comment
        ]);
    }
}