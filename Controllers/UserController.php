<?php

// Declare the namespace for the class
namespace App\Controllers;

// Include the required model class
require_once 'Models/UserModel.php';
require_once 'Models/LogsModel.php';
require "vendor/autoload.php";

use App\Models\UserModel;
use App\Models\LogsModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class UserController
{
    protected $userModel;
    protected $logsModel;

    // Constructor method
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->logsModel = new LogsModel();
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
        $this->sendEmail($user);
        $this->logsModel->create("L'utilisateur " . $user['pseudo_user'] . " a été créé");
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
            $this->logsModel->create("L'utilisateur " . $_SESSION['pseudo_user'] . " s'est connectée");
            header('Location: ../post/index');
        }
    }

    public function getConfirm($id_user){
        $this->userModel->confirm($id_user);
        echo 'Compte confirmé';
        echo '<a href="../../user/login">Se connecter</a>';
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
        $this->logsModel->create("L'utilisateur " . $user['pseudo_user'] . " a été modifié");
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
        if ($_SESSION['id_user'] == $id_user) {
            $this->getLogout();
            $this->logsModel->create("L'utilisateur " . $id_user . " a été supprimé");
            header('Location:../../user/register');
        } else {
            $this->logsModel->create("L'utilisateur " . $id_user . " a été supprimé");
            header('Location:../../user/list');
        }
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
        header('Location:../../user/list');
    }

    // Method for updating the user role to moderator
    public function getUpdateModo($id_user)
    {
        $this->userModel->updateModo($id_user);
        $users = $this->userModel->getAll();
        header('Location:../../user/list');
    }

    public function sendEmail($user)
    {

        $mail = new PHPMailer(true);

        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Username = "shadics2000@gmail.com";
        $mail->Password = "ibtcvwshkubmoleu";

        $mail->setFrom("shadics2000@gmail.com");
        $mail->addAddress($user['mail_user']);

        $confirmationLink = "http://localhost/bonnefete/user/confirm/" . $user['pseudo_user'];

        $mail->Subject = "Confirmation";
        $mail->isHTML(true);
        $mail->Body = "Veuillez confirmer votre adresse : <a href='" . $confirmationLink . "'>ici</a>";

        $mail->send();

        echo 'Message de confirmation envoyé';
        echo '<a href="../user/login">Se connecter</a>';
    }
}
