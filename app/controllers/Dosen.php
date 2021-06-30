<?php

class Dosen extends Controller
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
            'title' => 'View Dosen',
            'dataDosen' => $this->model('Dosen_model')->getAllDosen(),
        ];
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('dosen/index', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        if ($this->model('Dosen_model')->addDataDosen($_POST) > 0) {
            header('Location:' . BASEURL . '/dosen');
            Flasher::setFlash('Success', 'Adding Data Dosen', 'success');
            exit;
        } else {
            header('Location:' . BASEURL . '/dosen');
            Flasher::setFlash('Error', 'Failed Adding Data Dosen', 'danger');
            exit;
        }
    }

    public function delete($kd_dosen)
    {
        if ($this->model('Dosen_model')->deleteDataDosen($kd_dosen) > 0) {
            header('Location:' . BASEURL . '/dosen');
            Flasher::setFlash('Success', 'Delete Data', 'success');
            exit;
        } else {
            header('Location:' . BASEURL . '/dosen');
            Flasher::setFlash('Error', 'Failed Delete Data', 'danger');
            exit;
        }
    }

    public function getSingelData()
    {

        echo json_encode($this->model('Dosen_model')->getDataSingel($_POST['kd_dosen']));
    }

    public function updateData()
    {
        if ($this->model('Dosen_model')->updateDataDosen($_POST) > 0) {
            header('Location:' . BASEURL . '/dosen');
            Flasher::setFlash('Success', 'Update Data Dosen', 'success');
            exit;
        } else {
            header('Location:' . BASEURL . '/dosen');
            Flasher::setFlash('Error', 'Failed Update Data Dosen', 'danger');
            exit;
        }
    }
}
