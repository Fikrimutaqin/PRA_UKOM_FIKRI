<?php
class Matakuliah extends Controller
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
            'title' => 'View Matakuliah',
            'dataMatakuliah' => $this->model('Matakuliah_model')->getAllMatkul(),
        ];
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('matakuliah/index', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        if ($this->model('Matakuliah_model')->addDataMatkul($_POST) > 0) {
            header('Location:' . BASEURL . '/matakuliah');
            Flasher::setFlash('Success', 'Adding Data Matakuliah', 'success');
            exit;
        } else {
            header('Location:' . BASEURL . '/matakuliah');
            Flasher::setFlash('Error', 'Failed Adding Data Matakuliah', 'danger');
            exit;
        }
    }

    public function delete($kd_matkul)
    {
        if ($this->model('Matakuliah_model')->deleteDataMatkul($kd_matkul) > 0) {
            header('Location:' . BASEURL . '/matakuliah');
            Flasher::setFlash('Success', 'Delete Data', 'success');
            exit;
        } else {
            header('Location:' . BASEURL . '/matakuliah');
            Flasher::setFlash('Error', 'Failed Delete Data', 'danger');
            exit;
        }
    }

    public function getSingelData()
    {

        echo json_encode($this->model('Matakuliah_model')->getDataSingel($_POST['kd_matkul']));
    }

    public function updateData()
    {
        if ($this->model('Matakuliah_model')->updateDataMatkul($_POST) > 0) {
            header('Location:' . BASEURL . '/matakuliah');
            Flasher::setFlash('Success', 'Update Data Matkul', 'success');
            exit;
        } else {
            header('Location:' . BASEURL . '/matakuliah');
            Flasher::setFlash('Error', 'Failed Update Data Matkul', 'danger');
            exit;
        }
    }
}
