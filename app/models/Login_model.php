<?php
class Login_model
{
    private $tabel = 'tbl_users';
    private $db;

    public function __construct()
    {
        session_start();
        $this->db = new Database;
    }

    public function checkLogin()
    {
        try {
            $log_username = $this->username = $_POST['username'];
            $log_password = $this->password = $_POST['password'];

            $sql =
                "SELECT * FROM $this->tabel WHERE username = :username AND password = :password";

            $this->db->query($sql);
            $this->db->bind(':username', $log_username);
            $this->db->bind(':password', $log_password);
            $this->db->execute();

            $count =  $this->db->rowCount();

            if ($count == 1) {
                $_SESSION['username'] = $log_username;
                header('location:' . BASEURL . '/dashboard');
                return;
            } else {
                header('location:' . BASEURL . '/');
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
