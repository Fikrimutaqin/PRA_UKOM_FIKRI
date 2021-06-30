<?php
class Schedule_model
{
    private $tabel = 'tbl_jadwal';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addDataSchedule($data)
    {
        try {
            $query =
                "INSERT INTO $this->tabel 
                        VALUES 
                        ('',:kd_dosen, :kd_matkul, :ruang, :waktu)";

            $this->db->query($query);
            $this->db->bind('kd_dosen', $data['kd_dosen']);
            $this->db->bind('kd_matkul', $data['kd_matkul']);
            $this->db->bind('ruang', $data['ruang']);
            $this->db->bind('waktu', $data['waktu']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function listDataSchedule()
    {
        try {
            $this->db->query("SELECT * FROM $this->tabel");
            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteDataSchedule($id)
    {
        try {
            $query = "DELETE FROM $this->tabel WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);

            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDataSingel($id)
    {
        try {
            $query = "SELECT * FROM $this->tabel WHERE id= :id";
            $this->db->query($query);
            $this->db->bind('id', $id);

            return $this->db->single();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateDataSchedule($data)
    {
        try {
            $query =
                "UPDATE $this->tabel 
                        SET
                        kd_dosen = :kd_dosen,
                        kd_matkul = :kd_matkul,
                        ruang = :ruang,
                        waktu = :waktu
                        WHERE id= :id
                ";

            $this->db->query($query);
            $this->db->bind('kd_dosen', $data['kd_dosen']);
            $this->db->bind('kd_matkul', $data['kd_matkul']);
            $this->db->bind('ruang', $data['ruang']);
            $this->db->bind('waktu', $data['waktu']);
            $this->db->bind('id', $data['id']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
