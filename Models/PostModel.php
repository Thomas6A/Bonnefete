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

    /**
     * Get all posts
     *
     * @return array An array containing all the posts
     */
    public function getAll(){
        $query = $this->connection->getPdo()->prepare("SELECT id_post,content_post,date_post,pseudo_user,image_post FROM post inner join user on post.id_user = user.id_user");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Post");
    }

    /**
     * Create a new post
     *
     * @param array $content The content of the post
     * @param array $user The user who created the post
     * @param string $image The image associated with the post
     */
    public function create($content, $user, $image){
        $query = $this->connection->getPdo()->prepare('INSERT INTO post (content_post,date_post,id_user,image_post) VALUES (:content_post, now(), :id_user, :image_post)');
        $query->execute([
            'content_post' => $content['content_post'],
            'id_user' => $user['id_user'],
            'image_post' => $image
        ]);
    }

    /**
     * Get a post by its ID
     *
     * @param int $id The ID of the post
     * @return object The post object
     */
    public function getById($id){
        $query = $this->connection->getPdo()->prepare('SELECT id_post,content_post,date_post,pseudo_user,image_post FROM post inner join user on post.id_user = user.id_user WHERE id_post = :id_post');
        $query->execute([
            'id_post' => $id
        ]);
        $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\Post");
        return $query->fetch();
    }

    /**
     * Update a post
     *
     * @param int $id_post The ID of the post
     * @param array $post The updated post data
     */
    public function update($id_post, $post){
        $query = $this->connection->getPdo()->prepare('update post set content_post = :content_post where id_post = :id_post');
        $query->execute([
            'id_post' => $id_post,
            'content_post' => $post['content_post']
        ]);

    }

    /**
     * Delete a post
     *
     * @param int $id_post The ID of the post to be deleted
     */
    public function delete($id_post){
        $query = $this->connection->getPdo()->prepare('DELETE FROM post WHERE id_post = :id_post');
        $query ->execute([
            'id_post' => $id_post
        ]);
    }

     /**
     * Get a list of posts by a user's pseudo name
     *
     * @param string $pseudo_user The pseudo name of the user
     * @return array An array containing the posts
     */
    public function getList($pseudo_user){
        $query = $this->connection->getPdo()->prepare("SELECT id_post,content_post,date_post,pseudo_user FROM post inner join user on post.id_user = user.id_user where pseudo_user = :pseudo_user");
        $query->execute([
            'pseudo_user' => $pseudo_user
        ]);
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Post");
    }

}