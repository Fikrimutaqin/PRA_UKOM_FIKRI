<?php

class Login extends Controller
{

    public function __construct()
    {
        if (isset($_SESSION['username']) == 1) {
            header('Location: ' . BASEURL . '/dashboard');
        }
    }
    public function index()
    {
        $data = [
            'title' => 'Form Login'
        ];
        $this->view('templates/header', $data);
        $this->view('login/login');
        $this->view('templates/footer');
    }

    public function postLogin()
    {
        $this->model('Login_model')->checkLogin();
    }

    public function _logout()
    {
        session_start();
        session_destroy();

        header('Location: ' . BASEURL . '/');
    }
}
