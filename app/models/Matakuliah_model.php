<?php

class Matakuliah_model
{
    private $tabel = 'tbl_matkul';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMatkul()
    {
        try {
            $this->db->query("SELECT * FROM $this->tabel");
            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addDataMatkul($data)
    {
        try {
            $query =
                "INSERT INTO $this->tabel 
                        VALUES 
                        ('',:nama, :sks)";

            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('sks', $data['sks']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteDataMatkul($kd_matkul)
    {
        try {
            $query = "DELETE FROM $this->tabel WHERE kd_matkul = :kd_matkul";
            $this->db->query($query);
            $this->db->bind('kd_matkul', $kd_matkul);

            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDataSingel($kd_matkul)
    {
        try {
            $query = "SELECT * FROM $this->tabel WHERE kd_matkul= :kd_matkul";
            $this->db->query($query);
            $this->db->bind('kd_matkul', $kd_matkul);

            return $this->db->single();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateDataMatkul($data)
    {
        try {
            $query =
                "UPDATE $this->tabel 
                        SET 
                        nama = :nama, 
                        sks = :sks
                        WHERE kd_matkul = :kd_matkul
                ";

            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('sks', $data['sks']);
            $this->db->bind('kd_matkul', $data['kd_matkul']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
