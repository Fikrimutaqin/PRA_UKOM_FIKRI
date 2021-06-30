<?php
class Schedule extends Controller
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
            'title' => 'View Jadwal Matakuliah',
            'dataDosen' => $this->model('Dosen_model')->getAllDosen(),
            'dataMatkul' => $this->model('Matakuliah_model')->getAllMatkul(),
            'dataList' => $this->list(),
        ];
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('schedule/index', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        if ($this->model('Schedule_model')->addDataSchedule($_POST) > 0) {
            header('Location:' . BASEURL . '/schedule');
            Flasher::setFlash('Success', 'Adding Data', 'success');
            exit;
        } else {
            header('Location:' . BASEURL . '/schedule');
            Flasher::setFlash('Error', 'Failed Adding Data', 'danger');
            exit;
        }
    }

    public function list()
    {
        return $this->model('Schedule_model')->listDataSchedule();
    }

    public function delete($id)
    {
        if ($this->model('Schedule_model')->deleteDataSchedule($id) > 0) {
            header('Location:' . BASEURL . '/schedule');
            Flasher::setFlash('Success', 'Delete Data', 'success');
            exit;
        } else {
            header('Location:' . BASEURL . '/schedule');
            Flasher::setFlash('Error', 'Failed Delete Data', 'danger');
            exit;
        }
    }

    public function getSingelData()
    {

        echo json_encode($this->model('Schedule_model')->getDataSingel($_POST['id']));
    }

    public function updateData()
    {
        if ($this->model('Schedule_model')->updateDataSchedule($_POST) > 0) {
            header('Location:' . BASEURL . '/schedule');
            Flasher::setFlash('Success', 'Update Data', 'success');
            exit;
        } else {
            header('Location:' . BASEURL . '/schedule');
            Flasher::setFlash('Error', 'Failed Update Data', 'danger');
            exit;
        }
    }
}
