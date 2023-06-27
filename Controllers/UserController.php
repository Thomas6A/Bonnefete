<?php

namespace App\Controllers;
require_once 'Models/UserModel.php';

use App\Models\UserModel;

class UserController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function getRegister()
    {
        require_once 'Views/user/register.php';
    }

    public function postRegister()
    {
        $user = $_POST;
        $message = $this->userModel->createUser($user);
        echo $message;
        echo '<a href="../user/login">Se connecter</a>';
    }

    public function getLogin(){
        require_once 'Views/user/login.php';
    }

    public function postLogin(){
        $user = $_POST;
        $this->userModel->login($user);
        header('Location: ../user/register');
    }

    public function getLogout(){
        session_destroy();
        header('Location: ../user/register');
    }

    public function getUpdate($id_user){
        $user = $this->userModel->getById($id_user);
        require_once 'Views/user/profile.php';
    }

    public function postUpdate($id_user){
        $user = $_POST;
        $this->userModel->update($id_user,$user);
        header('Location:../../user/register');
    }

    public function getUpdatePassword($id_user){
        $user = $this->userModel->getById($id_user);
        require_once 'Views/user/mdp.php';
    }

    public function postUpdatePassword($id_user){
        $password = $_POST;
        $this->userModel->updatePassword($id_user,$password);
        header('Location:../../user/update/'.$id_user);
    }

    public function getDelete($id_user){
        $this->userModel->delete($id_user);
        $this->getLogout();
        header('Location:../../user/register');
    }
}