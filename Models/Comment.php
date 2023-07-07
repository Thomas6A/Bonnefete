<?php

namespace App\Models;

class Comment
{
    protected int $id_comment;
    protected string $content_comment;
    protected string $date_comment;
    protected int $id_user;
    protected int $id_post;
    protected int $id_precomment;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id_comment;
    }

    /**
     * @param int $id_comment
     */
    public function setId(int $id_comment): void
    {
        $this->id_comment = $id_comment;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content_comment;
    }

    /**
     * @param string $content_post
     */
    public function setContent(string $content_comment): void
    {
        $this->content_comment = $content_comment;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date_comment;
    }

    /**
     * @param string $date_comment
     */
    public function setDate(string $date_comment): void
    {
        $this->date_comment = $date_comment;
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

    public function getIdPrecomment(): int
    {
        return $this->id_precomment;
    }

    public function setIdPrecomment(int $id_precomment): void
    {
        $this->id_precomment = $id_precomment;
    }


}