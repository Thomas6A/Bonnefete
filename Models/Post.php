<?php

namespace App\Models;

class Post
{
    protected int $id_post;
    protected string $content_post;
    protected string $date_post;
    protected int $id_user;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id_post;
    }

    /**
     * @param int $id_post
     */
    public function setId(int $id_post): void
    {
        $this->id_post = $id_post;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content_post;
    }

    /**
     * @param string $content_post
     */
    public function setContent(string $content_post): void
    {
        $this->content_post = $content_post;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date_post;
    }

    /**
     * @param string $date_post
     */
    public function setDate(string $date_post): void
    {
        $this->date_post = $date_post;
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


}