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

    /**
     * Get comments for a specific post
     *
     * @param int $id_post The ID of the post
     * @return array An array of Comment objects
     */
    public function getCommentsPost($id_post){
        $query = $this->connection->getPdo()->prepare("SELECT id_comment,content_comment,date_comment,pseudo_user FROM comment inner join post on post.id_post = comment.id_post inner join user on post.id_user = user.id_user where post.id_post = :id_post and comment.id_precomment is null");
        $query->execute([
            'id_post' => $id_post
        ]);
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Comment");
    }

    /**
     * Create a new comment for a post
     *
     * @param string $content The content of the comment
     * @param array $user The user who posted the comment
     * @param int $id_post The ID of the post
     */
    public function create($content, $user, $id_post){
        $query = $this->connection->getPdo()->prepare('INSERT INTO comment (content_comment,date_comment,id_user,id_post) VALUES (:content_comment, now(), :id_user, :id_post)');
        $query->execute([
            'content_comment' => $content['content_comment'],
            'id_user' => $user['id_user'],
            'id_post' => $id_post
        ]);
    }

    /**
     * Get child comments for a specific post
     *
     * @param int $id_post The ID of the post
     * @return array An array of Comment objects representing child comments
     */
    public function getCommentsCom($id_post){
        $query = $this->connection->getPdo()->prepare("SELECT id_comment,content_comment,date_comment,pseudo_user,id_precomment FROM comment inner join post on post.id_post = comment.id_post inner join user on post.id_user = user.id_user where post.id_post = :id_post and comment.id_precomment is not null");
        $query->execute([
            'id_post' => $id_post
        ]);
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Comment");
    }

    /**
     * Create a new child comment for a post
     *
     * @param string $content The content of the comment
     * @param array $user The user who posted the comment
     * @param int $id_post The ID of the post
     * @param int $id_comment The ID of the parent comment
     */
    public function createCom($content, $user, $id_post, $id_comment){
        $query = $this->connection->getPdo()->prepare('INSERT INTO comment (content_comment,date_comment,id_precomment,id_user,id_post) VALUES (:content_comment, now(), :id_precomment, :id_user, :id_post)');
        $query->execute([
            'content_comment' => $content['content_comment'],
            'id_precomment' => $id_comment,
            'id_user' => $user['id_user'],
            'id_post' => $id_post
        ]);
    }

    /**
     * Get a comment by its ID
     *
     * @param int $id The ID of the comment
     * @return Comment|null The Comment object or null if not found
     */
    public function getById($id){
        $query = $this->connection->getPdo()->prepare('SELECT id_comment,content_comment,date_comment,pseudo_user,id_post FROM comment inner join user on comment.id_user = user.id_user WHERE id_comment = :id_comment');
        $query->execute([
            'id_comment' => $id
        ]);
        $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\Comment");
        return $query->fetch();
    }

    /**
     * Update a comment by its ID
     *
     * @param int $id_comment The ID of the comment
     * @param array $comment The updated comment data
     */
    public function update($id_comment, $comment){
        $query = $this->connection->getPdo()->prepare('update comment set content_comment = :content_comment where id_comment = :id_comment');
        $query->execute([
            'id_comment' => $id_comment,
            'content_comment' => $comment['content_post']
        ]);

    }

    /**
     * Delete a comment by its ID
     *
     * @param int $id_comment The ID of the comment to delete
     */
    public function delete($id_comment){
        $query = $this->connection->getPdo()->prepare('DELETE FROM comment WHERE id_comment = :id_comment');
        $query ->execute([
            'id_comment' => $id_comment
        ]);
    }
}