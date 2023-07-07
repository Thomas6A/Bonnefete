<?php

namespace App\Models;
require_once 'Database.php';
require_once 'Models/Logs.php';
use App\Database;

use PDO;

class LogsModel
{
    private $connection;

    public function __construct(){
        $this->connection = new Database();
    }

    public function create($content){
        $query = $this->connection->getPdo()->prepare('INSERT INTO logs (content_logs,date_logs) VALUES (:content_post, now())');
        $query->execute([
            'content_post' => $content
        ]);
    }

    public function getAll(){
        $query = $this->connection->getPdo()->prepare("SELECT id_logs,content_logs,date_logs FROM logs");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\Post");
    }

}