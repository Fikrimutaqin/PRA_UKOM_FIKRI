<?php
class Dashboard extends Controller
{

    public function __construct()
    {

        if (isset($_SESSION['username']) == 0) {
            header('Location: ' . BASEURL . '/');
        }
    }
    public function index()
    {
        $data = [
            'title' => 'View Dashboard'
        ];
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('dashboard/index');
        $this->view('templates/footer');
    }
}
