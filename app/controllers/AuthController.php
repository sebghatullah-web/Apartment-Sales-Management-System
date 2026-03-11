<?php

class AuthController extends Controller
{
    public function login()
    {
        $page_title = "Login";
        $this->view("auth/login", compact('page_title'));
    }

    public function doLogin()
    {
        session_start();

        $userModel = $this->model("User");

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $user = $userModel->findByUsername($username);

        if ($user && $user['password'] === $password) {
            $_SESSION['user'] = $user;
            header("Location: /apartment_system/public/?route=dashboard");
            exit;
        }

        $_SESSION['error'] = "نام کاربری یا رمز عبور اشتباه است.";
        header("Location: /apartment_system/public/?route=login");
        exit;
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /apartment_system/public/?route=login");
        exit;
    }
}
