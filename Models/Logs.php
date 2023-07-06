<?php

namespace App\Models;

class Logs
{
    protected int $id_logs;
    protected string $content_logs;
    protected string $date_logs;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id_logs;
    }

    /**
     * @param int $id_logs
     */
    public function setId(int $id_logs): void
    {
        $this->id_logs = $id_logs;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content_logs;
    }

    /**
     * @param string $content_logs
     */
    public function setContent(string $content_logs): void
    {
        $this->content_logs = $content_logs;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date_logs;
    }

    /**
     * @param string $date_logs
     */
    public function setDate(string $date_logs): void
    {
        $this->date_logs = $date_logs;
    }


}