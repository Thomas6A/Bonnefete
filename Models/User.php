<?php

namespace App\Models;

class User
{
    protected int $id_user;
    protected string $pseudo_user;
    protected string $mail_user;
    protected string $password_user;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id_user;
    }

    /**
     * @param int $id_user
     */
    public function setId(int $id_user): void
    {
        $this->id_user = $id_user;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail_user;
    }

    /**
     * @param string $mail_user
     */
    public function setEmail(string $mail_user): void
    {
        $this->mail_user = $mail_user;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo_user;
    }

    /**
     * @param string $pseudo_user
     */
    public function setPseudo(string $pseudo_user): void
    {
        $this->pseudo_user = $pseudo_user;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password_user;
    }

    /**
     * @param string $password_user
     */
    public function setPassword(string $password_user): void
    {
        $this->password_user = $password_user;
    }


}