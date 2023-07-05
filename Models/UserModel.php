<?php

namespace App\Models;

require_once 'Database.php';
require_once 'Models/User.php';

use App\Database;

use PDO;

class UserModel
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }

    /**
     * Create a new user
     *
     * @param array $user The user data
     * @return string|\PDOException The success message or the PDOException object if an error occurred
     */
    public function createUser($user)
    {
        $password = password_hash($user['password_user'], PASSWORD_DEFAULT);
        try {
            $query = $this->connection->getPdo()->prepare('INSERT INTO user (mail_user, pseudo_user, password_user, isModerator, isSuperAdmin) VALUES (:mail_user, :pseudo_user, :password_user, :isModerator, :isSuperAdmin)');
            $query->execute([
                'mail_user' => $user['mail_user'],
                'pseudo_user' => $user['pseudo_user'],
                'password_user' => $password,
                'isModerator' => 0,
                'isSuperAdmin' => 0
            ]);
            return "Bien enregistré";
        } catch (\PDOException $e) {
            return $e;
        }
    }

    /**
     * Perform user login
     *
     * @param array $user The user login data
     */
    public function login(array $user)
    {
        $mail = $user['mail_user'];
        $password = $user['password_user'];

        $query = $this->connection->getPdo()->prepare('SELECT password_user FROM user WHERE mail_user = :mail_user');
        $query->execute([
            "mail_user" => $mail
        ]);
        $bdd_pass = $query->fetch(\PDO::FETCH_ASSOC);
        if (password_verify($password, $bdd_pass['password_user'])) {
            $query = $this->connection->getPdo()->prepare('SELECT id_user,pseudo_user,isModerator,isSuperAdmin FROM user WHERE mail_user = :mail_user');
            $query->execute([
                "mail_user" => $mail
            ]);
            $userCo = $query->fetch(\PDO::FETCH_ASSOC);
            $_SESSION['id_user'] = $userCo['id_user'];
            $_SESSION['username'] = $mail;
            $_SESSION['pseudo_user'] = $userCo['pseudo_user'];
            $_SESSION['isModerator'] = $userCo['isModerator'];
            $_SESSION['isSuperAdmin'] = $userCo['isSuperAdmin'];
        }
    }

    /**
     * Update a user
     *
     * @param int $id_user The ID of the user to update
     * @param array $user The updated user data
     */
    public function update($id_user, $user)
    {
        $query = $this->connection->getPdo()->prepare('update user set pseudo_user = :pseudo_user, mail_user = :mail_user where id_user = :id_user');
        $query->execute([
            'id_user' => $id_user,
            'pseudo_user' => $user['pseudo_user'],
            'mail_user' => $user['mail_user']
        ]);
        $_SESSION['username'] = $user['mail_user'];
        $_SESSION['pseudo_user'] = $user['pseudo_user'];
    }

    /**
     * Get a user by ID
     *
     * @param int $id_user The ID of the user
     * @return object The user object
     */
    public function getById($id_user)
    {
        $query = $this->connection->getPdo()->prepare('SELECT id_user,pseudo_user,mail_user,password_user FROM user where id_user = :id_user');
        $query->execute([
            'id_user' => $id_user
        ]);
        $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\User");
        return $query->fetch();
    }

    /**
     * Update a user's password
     *
     * @param int $id_user The ID of the user
     * @param array $user The updated user data
     */
    public function updatePassword($id_user, $user)
    {
        $password = password_hash($user['password_user'], PASSWORD_DEFAULT);
        $query = $this->connection->getPdo()->prepare('update user set password_user = :password_user where id_user = :id_user');
        $query->execute([
            'id_user' => $id_user,
            'password_user' => $password
        ]);
    }

    /**
     * Delete a user
     *
     * @param int $id_user The ID of the user to delete
     */
    public function delete($id_user)
    {
        $query = $this->connection->getPdo()->prepare('DELETE FROM user WHERE id_user = :id_user');
        $query->execute([
            'id_user' => $id_user
        ]);
    }

    /**
     * Get all users
     *
     * @return array The array of user objects
     */
    public function getAll()
    {
        $query = $this->connection->getPdo()->prepare("SELECT id_user,pseudo_user,mail_user,isModerator,isSuperAdmin FROM user");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Models\User");
    }

    /**
     * Update user's status as moderator
     *
     * @param int $id_user The ID of the user
     */
    public function updateStatut($id_user)
    {
        $query = $this->connection->getPdo()->prepare('update user set isModerator = 1 where id_user = :id_user');
        $query->execute([
            'id_user' => $id_user
        ]);
    }

    /**
     * Update user's status as not moderator
     *
     * @param int $id_user The ID of the user
     */
    public function updateModo($id_user)
    {
        $query = $this->connection->getPdo()->prepare('update user set isModerator = 0 where id_user = :id_user');
        $query->execute([
            'id_user' => $id_user
        ]);
    }
}
