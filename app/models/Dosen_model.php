<?php
class Dosen_model
{
    private $tabel = 'tbl_dosen';
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDosen()
    {
        try {
            $this->db->query("SELECT * FROM $this->tabel");
            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addDataDosen($data)
    {
        try {
            $query =
                "INSERT INTO $this->tabel 
                        VALUES 
                        ('',:nama, :alamat)";

            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('alamat', $data['alamat']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteDataDosen($kd_dosen)
    {
        try {
            $query = "DELETE FROM $this->tabel WHERE kd_dosen = :kd_dosen";
            $this->db->query($query);
            $this->db->bind('kd_dosen', $kd_dosen);

            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDataSingel($kd_dosen)
    {
        try {
            $query = "SELECT * FROM $this->tabel WHERE kd_dosen= :kd_dosen";
            $this->db->query($query);
            $this->db->bind('kd_dosen', $kd_dosen);

            return $this->db->single();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateDataDosen($data)
    {
        try {
            $query =
                "UPDATE $this->tabel 
                        SET 
                        nama = :nama, 
                        alamat = :alamat
                        WHERE kd_dosen = :kd_dosen
                ";

            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('alamat', $data['alamat']);
            $this->db->bind('kd_dosen', $data['kd_dosen']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
