<?php

namespace App\Models;
require_once 'Database.php';
require_once 'Models/Post.php';
use App\Database;

use PDO;

class PostModel
{
    private $connection;

    public function __construct(){
        $this->connection = new Database();
    }

    public function getAll(){
        $query = $this->connection->getPdo()->prepare("SELECT id_post,content_post,date_post,pseudo_user FROM post inner join user on post.id_user = user.id_user");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Post");
    }

    public function create($content, $user){
        $query = $this->connection->getPdo()->prepare('INSERT INTO post (content_post,date_post,id_user) VALUES (:content_post, now(), :id_user)');
        $query->execute([
            'content_post' => $content['content_post'],
            'id_user' => $user['id_user']
        ]);
    }

    public function getById($id){
        $query = $this->connection->getPdo()->prepare('SELECT id_post,content_post,date_post,pseudo_user FROM post inner join user on post.id_user = user.id_user WHERE id_post = :id_post');
        $query->execute([
            'id_post' => $id
        ]);
        $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\Post");
        return $query->fetch();
    }

    public function update($id_post, $post){
        $query = $this->connection->getPdo()->prepare('update post set content_post = :content_post where id_post = :id_post');
        $query->execute([
            'id_post' => $id_post,
            'content_post' => $post['content_post']
        ]);
    }

}