<?php
class usermodel extends databases
{
    private $db;
    public function __construct()
    {
        $this->db = new databases;
    }

    public function adduser($data)
    {
        if (isset($_POST['register']) && strlen($_POST['username']) > 1 && strlen($_POST['password'] > 1) ){
            $query = "INSERT INTO user VALUES(:userid,:name,:password,:profilephoto,:coverphoto)";
            $this->db->query($query);
            $this->db->bind("userid", 0);
            $this->db->bind("name", htmlspecialchars($data["username"]));
            $this->db->bind("profilephoto", null);
            $this->db->bind("coverphoto", null);
            $this->db->bind("password", password_hash($data["password"], PASSWORD_BCRYPT));
            $this->db->execute();
            header("location:" . MAINURL . "home/login");
        }
        else{
            header("location:" . MAINURL . "home/signin");
        }

        var_dump($data["username"]);
    }
    public function checkuser($data)
    {
        $nama = htmlspecialchars($data["username"]);
        $query = "SELECT * FROM user WHERE BINARY name = '$nama' ";
        $this->db->query($query);
        return $this->db->result();
    }
}


