<?php
class home extends controller
{

    public function signin()
    {
        $data["judul"] = "signin";
        if(isset($_POST["register"])){
            $this->model("usermodel")->adduser($_POST);
        }
        $this->views("template/upper", $data);
        $this->views("SignIn");    
    }
    public function login()
    {
        $data["judul"] = "login";
        if(isset($_POST["loginbutton"])){
            $this->logincheck();
         }
        $this->views("template/upper", $data);
        $_SESSION["login"] = false;
        $_SESSION["validation"] = isset($_SESSION["identitas"]) ? "username/password salah" : "";
        $this->views("login");
        $this->views("template/down", $data);
    }


    public function logincheck()
    {
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