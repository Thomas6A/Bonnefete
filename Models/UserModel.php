<?php

namespace App\Models;
require_once 'Database.php';
require_once 'Models/User.php';
use App\Database;

use PDO;

class UserModel
{
    private $connection;

    public function __construct(){
        $this->connection = new Database();
    }

    public function createUser($user){
        $password = password_hash($user['password_user'], PASSWORD_DEFAULT);
        try{
            $query = $this->connection->getPdo()->prepare('INSERT INTO user (mail_user, pseudo_user, password_user, isModerator, isSuperAdmin) VALUES (:mail_user, :pseudo_user, :password_user, :isModerator, :isSuperAdmin)');
            $query->execute([
                'mail_user' => $user['mail_user'],
                'pseudo_user' => $user['pseudo_user'],
                'password_user' => $password,
                'isModerator' => 0,
                'isSuperAdmin' => 0
            ]);
            return "Bien enregistré";
        }catch (\PDOException $e){
            return $e;
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
            $query = $this->connection->getPdo()->prepare('SELECT id_user,pseudo_user,isModerator,isSuperAdmin FROM user WHERE mail_user = :mail_user');
            $query->execute([
                "mail_user"=>$mail
            ]);
            $userCo = $query->fetch(\PDO::FETCH_ASSOC);
            $_SESSION['id_user'] = $userCo['id_user'];
            $_SESSION['username'] = $mail;
            $_SESSION['pseudo_user'] = $userCo['pseudo_user'];
            $_SESSION['isModerator'] = $userCo['isModerator'];
            $_SESSION['isSuperAdmin'] = $userCo['isSuperAdmin'];
        }
    }

    public function update($id_user, $user){
        $query = $this->connection->getPdo()->prepare('update user set pseudo_user = :pseudo_user, mail_user = :mail_user where id_user = :id_user');
        $query->execute([
            'id_user' => $id_user,
            'pseudo_user' => $user['pseudo_user'],
            'mail_user' => $user['mail_user']
        ]);
        $_SESSION['username'] = $user['mail_user'];
        $_SESSION['pseudo_user'] = $user['pseudo_user'];
    }

    public function getById($id_user){
        $query = $this->connection->getPdo()->prepare('SELECT id_user,pseudo_user,mail_user,password_user FROM user where id_user = :id_user');
        $query->execute([
            'id_user' => $id_user
        ]);
        $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\User");
        return $query->fetch();
    }

    public function updatePassword($id_user, $user){
        $password = password_hash($user['password_user'], PASSWORD_DEFAULT);
        $query = $this->connection->getPdo()->prepare('update user set password_user = :password_user where id_user = :id_user');
        $query->execute([
            'id_user' => $id_user,
            'password_user' => $password
        ]);
    }

    public function delete($id_user){
        $query = $this->connection->getPdo()->prepare('DELETE FROM user WHERE id_user = :id_user');
        $query ->execute([
            'id_user' => $id_user
        ]);
    }

    public function getAll(){
        $query = $this->connection->getPdo()->prepare("SELECT id_user,pseudo_user,mail_user,isModerator,isSuperAdmin FROM user");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\User");
    }

    public function updateStatut($id_user){
        $query = $this->connection->getPdo()->prepare('update user set isModerator = 1 where id_user = :id_user');
        $query ->execute([
            'id_user' => $id_user
        ]);
    }

    public function updateModo($id_user){
        $query = $this->connection->getPdo()->prepare('update user set isModerator = 0 where id_user = :id_user');
        $query ->execute([
            'id_user' => $id_user
        ]);
    }
}