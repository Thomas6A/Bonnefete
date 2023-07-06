<?php

// Declare the namespace for the class
namespace App\Controllers;

// Include the required model class
require_once 'Models/UserModel.php';

use App\Models\UserModel;

class UserController
{
    protected $userModel;

    // Constructor method
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Method for getting the register page
    public function getRegister()
    {
        require_once 'Views/user/register.php';
    }

    // Method for processing the registration form
    public function postRegister()
    {
        $user = $_POST;
        $message = $this->userModel->createUser($user);
        echo $message;
        echo '<a href="../user/login">Se connecter</a>';
    }

    // Method for getting the login page
    public function getLogin()
    {
        require_once 'Views/user/login.php';
    }

    // Method for getting the RGPD page
    public function getrgpd()
    {
        require_once 'Views/user/RGPD.php';
    }

    // Method for processing the login form
    public function postLogin()
    {
        $user = $_POST;
        $this->userModel->login($user);
        if ($_SESSION == null) {
            header('Location: ../user/login');
        } else {
            header('Location: ../post/index');
        }
    }

    // Method for handling user logout
    public function getLogout()
    {
        session_destroy();
        header('Location: http://localhost/bonnefete/user/register');
    }

    // Method for getting the user profile update page
    public function getUpdate($id_user)
    {
        $user = $this->userModel->getById($id_user);
        require_once 'Views/user/profile.php';
    }

    // Method for updating the user profile
    public function postUpdate($id_user)
    {
        $user = $_POST;
        $this->userModel->update($id_user, $user);
        header('Location:../../post/index');
    }

    // Method for getting the password update page
    public function getUpdatePassword($id_user)
    {
        $user = $this->userModel->getById($id_user);
        require_once 'Views/user/mdp.php';
    }

    // Method for updating the user password
    public function postUpdatePassword($id_user)
    {
        $password = $_POST;
        $this->userModel->updatePassword($id_user, $password);
        header('Location:../../user/update/' . $id_user);
    }

    // Method for deleting a user
    public function getDelete($id_user)
    {
        $this->userModel->delete($id_user);
        if ($_SESSION['id_user'] == $id_user) :
            $this->getLogout();
        endif;
        header('Location:../../user/register');
    }

    // Method for getting the list of users
    public function getList()
    {
        $users = $this->userModel->getAll();
        require_once 'Views/user/listeUser.php';
    }

    // Method for updating the user status
    public function getUpdateStatut($id_user)
    {
        $this->userModel->updateStatut($id_user);
        $users = $this->userModel->getAll();
        require_once 'Views/user/listeUser.php';
    }

    // Method for updating the user role to moderator
    public function getUpdateModo($id_user)
    {
        $this->userModel->updateModo($id_user);
        $users = $this->userModel->getAll();
        require_once 'Views/user/listeUser.php';
    }
}
