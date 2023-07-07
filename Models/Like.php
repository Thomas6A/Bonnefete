<?php

namespace App\Models;

class Like
{
    protected int $id_like;
    protected int $id_user;
    protected int $id_post;
    protected int $id_comment;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id_like;
    }

    /**
     * @param int $id_like
     */
    public function setId(int $id_like): void
    {
        $this->id_like = $id_like;
    }

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->id_user;
    }

    /**
     * @param int $id_user
     */
    public function setIdUser(int $id_user): void
    {
        $this->id_user = $id_user;
    }

    /**
     * @return int
     */
    public function getIdPost(): int
    {
        return $this->id_post;
    }

    /**
     * @param int $id_post
     */
    public function setIdPost(int $id_post): void
    {
        $this->id_post = $id_post;
    }

    /**
     * @return int
     */
    public function getIdComment(): int
    {
        return $this->id_comment;
    }

    /**
     * @param int $id_comment
     */
    public function setIdComment(int $id_comment): void
    {
        $this->id_comment = $id_comment;
    }


}