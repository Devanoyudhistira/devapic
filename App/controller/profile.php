<?php
class Profile extends controller
{
    public function main()
    {
        $data["judul"] = "profile";
        $this->views("template/upper", $data);
        !isset($_SESSION["login"]) ? $_SESSION["login"] = false : $_SESSION["login"];
        if (!$_SESSION["login"]) {
            $this->views("nologin", $data);
        } else {
            $data["id"] = $_SESSION["id"];
            $data["nama"] = $_SESSION["nama"];
            $queryuser = $this->model("imagemodel")->getimage("SELECT profilephoto,coverphoto FROM user WHERE id = '$data[id]'");
            $data["profilephoto"] = $queryuser["profilephoto"] ? $queryuser["profilephoto"] : "profile.png";
            $data["coverphoto"] = $queryuser["coverphoto"] ? $queryuser["coverphoto"] : "profile.png";
            $idprofile = $data['id'];
            $data["imagepost"] = $this->model("imagemodel")->getallimage("SELECT imageid,file,type,deskripsi FROM gallery WHERE sender = '$idprofile'");
            $this->views("profile", $data);
        }
        $this->views("template/down", $data);
    }
    public function user($id)
    {
        $data["userprofile"] = $this->model("imagemodel")->getimage("SELECT name,profilephoto,coverphoto FROM user WHERE id = '$id'");
        $data["judul"] = "user";
        $this->views("template/upper", $data);
        $profileimage = isset($_SESSION['id']) ? $_SESSION['id'] : 17;
        $queryuser = $this->model("imagemodel")->getimage("SELECT profilephoto FROM user WHERE id = '$profileimage'");
        $data["profilephoto"] = $queryuser["profilephoto"] ? $queryuser["profilephoto"] : "profile.png";
        $data["profileuser"] = is_null($data['userprofile']["profilephoto"]) ? "profile.png" : $data['userprofile']["profilephoto"];
        $data["coveruser"] = is_null($data["userprofile"]["coverphoto"]) ? "profile.png" : $data["userprofile"]["coverphoto"];
        // $data["id"] = $_SESSION["id"];
        $data["imagepost"] = $this->model("imagemodel")->getallimage("SELECT imageid,file,type,deskripsi FROM gallery WHERE sender = '$id'");
        // var_dump($data["userprofile"]["coverphoto"]);
        $this->views("user", $data);
        $this->views("template/down", $data);
    }

    public function imagehandler()
    {
        $gambar = $_FILES["image"]["name"];
        $lokasigambar = $_FILES["image"]["tmp_name"];
        $eksistensifile = ['jpg', 'png', 'jpeg'];
        $eksistensigambar = explode('.', $gambar);
        $eksistensigambar = strtolower(end($eksistensigambar));
        $namafilerandom = uniqid();
        $namafilerandom .= '.';
        $namafilerandom .= $eksistensigambar;
        if(!in_array($eksistensigambar,$eksistensifile)){
            return null;
        }

        move_uploaded_file($lokasigambar, "public/image/" . $namafilerandom);
        return $namafilerandom;
    }
    public function profilehandler($target,$filetarget)
    {
        $gambar = $_FILES[$target]["name"];
        $lokasigambar = $_FILES[$target]["tmp_name"];
        $eksistensifile = ['jpg', 'png', 'jpeg'];
        $eksistensigambar = explode('.', $gambar);
        $eksistensigambar = strtolower(end($eksistensigambar));
        $namafilerandom = uniqid();
        $namafilerandom .= '.';
        $namafilerandom .= $eksistensigambar;
        
        if(!in_array($eksistensigambar,$eksistensifile)){
            return null;
        }

        move_uploaded_file($lokasigambar, "public/image/userprofile/$filetarget/" . $namafilerandom);
        return $namafilerandom;
    }
    public function tambahimage($sender)
    {
        $imagefile = $this->imagehandler();
        if (isset($_POST["submitpost"])) {
            $this->model("imagemodel")->addimage($_POST, $imagefile, $sender);
        }
        header("location:" . MAINURL . "profile/" . $sender);
    }

    public function deleteimage($id, $target)
    {
        $this->model("imagemodel")->deleteimage($id, $target);
        header("location:" . MAINURL . "profile/" . $target);
    }
    public function changeprofile($target,$formname,$pathname,$tablename)
    {
        $image = $this->profilehandler($formname,$pathname );
        $this->model("imagemodel")->updateimage("UPDATE user SET $tablename = '$image' WHERE id = '$target' ");
        header("location:" . MAINURL . "profile/" . $target);
    }
    public function changecover($target)
    {
        $image = $this->profilehandler("changecover","cover");
        $this->model("imagemodel")->updateimage("UPDATE user SET coverphoto = '$image' WHERE id = '$target' ");
        header("location:" . MAINURL . "profile/" . $target);
    }


}
