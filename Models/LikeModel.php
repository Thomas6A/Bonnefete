<?php

namespace App\Models;

require_once 'Database.php';
require_once 'Models/Like.php';

use App\Database;

use PDO;

class LikeModel
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }

    public function createPost($user, $id_post)
    {
        $query = $this->connection->getPdo()->prepare("INSERT INTO `like` (id_user, id_post) VALUES (:id_user, :id_post)");
        $query->execute([
            'id_user' => $user['id_user'],
            'id_post' => $id_post
        ]);
    }

    public function createComment($user, $id_comment)
    {
        $query = $this->connection->getPdo()->prepare('INSERT INTO `like` (id_user,id_comment) VALUES (:id_user, :id_comment)');
        $query->execute([
            'id_user' => $user['id_user'],
            'id_comment' => $id_comment
        ]);
    }

    public function nbLikePost($id_post)
    {
        $query = $this->connection->getPdo()->prepare("SELECT COUNT(*) as nb_like FROM `like` where id_post = :id_post");
        $query->execute([
            'id_post' => $id_post
        ]);
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Post");
    }

    public function nbLikeComment($id_post)
    {
        $query = $this->connection->getPdo()->prepare("SELECT COUNT(*) as nb_like, `like`.id_comment FROM `like` inner join comment on `like`.id_comment = comment.id_comment where comment.id_post = :id_post group by id_comment ");
        $query->execute([
            'id_post' => $id_post
        ]);
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Post");
    }

    public function hasLike($id_user, $id_post)
    {
        $query = $this->connection->getPdo()->prepare("SELECT id_user FROM `like` where id_post = :id_post and id_user = :id_user");
        $query->execute([
            'id_post' => $id_post,
            'id_user' => $id_user
        ]);
        if ($query->fetchAll(PDO::FETCH_CLASS, "App\Models\Post") == null) {
            return false;
        } else {
            return true;
        }
    }

    public function delete($id_user, $id_post)
    {
        $query = $this->connection->getPdo()->prepare('DELETE FROM `like` WHERE id_post = :id_post and id_user = :id_user');
        $query->execute([
            'id_post' => $id_post,
            'id_user' => $id_user
        ]);
    }

    public function deleteComment($id_user, $id_comment)
    {
        $query = $this->connection->getPdo()->prepare('DELETE FROM `like` WHERE id_comment = :id_comment and id_user = :id_user');
        $query->execute([
            'id_comment' => $id_comment,
            'id_user' => $id_user
        ]);
    }

    public function allLike(){
        $query = $this->connection->getPdo()->prepare("SELECT id_like,id_user,id_comment FROM `like` where id_comment is not null");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Like");
    }
}
