<?php
class home extends controller
{

    public function signin()
    {
        $data["judul"] = "signin";
        $this->views("template/upper", $data);
        $this->views("SignIn");
    }
    public function login()
    {
        $data["judul"] = "login";
        $this->views("template/upper", $data);
        $_SESSION["login"] = false;
        $_SESSION["validation"] = isset($_SESSION["identitas"]) ? "username/password salah" : "";
        $this->views("login");
        $this->views("template/down", $data);
    }
    public function imagehandler($location)
    {
        $gambar = $_FILES["profile"]["name"];
        $lokasigambar = $_FILES["profile"]["tmp_name"];
        $eksistensifile = ['jpg', 'png', 'jpeg'];
        $eksistensigambar = explode('.', $gambar);
        $eksistensigambar = strtolower(end($eksistensigambar));
        $namafilerandom = uniqid();
        $namafilerandom .= '.';
        $namafilerandom .= $eksistensigambar;
        if(!in_array($eksistensigambar,$eksistensifile)){
            return null;
        }

        move_uploaded_file($lokasigambar, "public/image/userprofile/$location/" . $namafilerandom);
        return $namafilerandom;
    }
    public function register()
    {
        $imageprofile = $this->imagehandler("profile");
        $imagecover = $this->imagehandler("cover");
        $this->model("usermodel")->adduser($_POST, $imageprofile,$imagecover);
    }


    public function logincheck()
    {
        session_start();
        if ($this->model("usermodel")->checkuser($_POST)) {
            $datauser = $this->model("usermodel")->checkuser($_POST);
            $password = $datauser["password"];
            $userpassword = $_POST["loginpassword"];
            if (password_verify($userpassword, $password)) {
                $_SESSION["login"] = true;
                $_SESSION["id"] = $datauser["id"];
                $_SESSION["nama"] = $datauser["name"];
                $_SESSION["profile"] = $datauser["profilephoto"];
                $_SESSION["cover"] = $datauser["coverphoto"];
                $_SESSION["identitas"] = true;
                header("location:" . MAINURL . "profile/main/".$datauser["id"]);
                exit;
            } 
                $_SESSION["login"] = false;
                $_SESSION["identitas"] = false;
                header("location:" . MAINURL . "home/login");
        }
            $_SESSION["login"] = false;
            $_SESSION["identitas"] = false;
            header("location:" . MAINURL . "home/login");
        
    }
    public function logout()
    {
        session_start();
        session_destroy();
        header("location:" . MAINURL . "home/login");
    }
}