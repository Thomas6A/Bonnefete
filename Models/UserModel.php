<?php

namespace App\Models;
require_once 'Database.php';
use App\Database;

class UserModel
{
    private $connection;

    public function __construct(){
        $this->connection = new Database();
    }

    public function createUser($user){
        $password = password_hash($user['password_user'], PASSWORD_DEFAULT);
        try{
            $query = $this->connection->getPdo()->prepare('INSERT INTO user (mail_user, pseudo_user, password_user) VALUES (:mail_user, :pseudo_user, :password_user)');
            $query->execute([
                'mail_user' => $user['mail_user'],
                'pseudo_user' => $user['pseudo_user'],
                'password_user' => $password
            ]);
            return "Bien enregistré";
        }catch (\PDOException $e){
            
            return "une erreur est survenue";
        }

    }
}