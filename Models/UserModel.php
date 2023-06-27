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

    public function login(array $user)
    {
        $mail = $user['mail_user'];
        $password = $user['password_user'];

        $query = $this->connection->getPdo()->prepare('SELECT password_user FROM user WHERE mail_user = :mail_user');
        $query->execute([
            "mail_user"=>$mail
        ]);
        $bdd_pass = $query->fetch(\PDO::FETCH_ASSOC);
        if(password_verify($password, $bdd_pass['password_user'])){
            $query = $this->connection->getPdo()->prepare('SELECT id_user,pseudo_user FROM user WHERE mail_user = :mail_user');
            $query->execute([
                "mail_user"=>$mail
            ]);
            $userCo = $query->fetch(\PDO::FETCH_ASSOC);
            $_SESSION['id_username'] = $userCo['id_user'];
            $_SESSION['username'] = $mail;
            $_SESSION['pseudo_user'] = $userCo['pseudo_user'];
        }
    }
}