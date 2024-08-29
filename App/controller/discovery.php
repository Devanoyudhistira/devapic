<?php
class discovery extends controller
{
    public function main()
    {
        $data["judul"] = "discovery";
        $data["image"] = $this->model("imagemodel")->getallimage("SELECT user.name,gallery.file,gallery.imageid,user.profilephoto from user join gallery on user.id = gallery.sender");
        $this->views("template/upper", $data);
        $profileimage = isset($_SESSION['id']) ? $_SESSION['id'] : 17;
        $queryuser = $this->model("imagemodel")->getimage("SELECT profilephoto FROM user WHERE id = '$profileimage'");
        $data["profileimage"] = $queryuser["profilephoto"] ? $queryuser["profilephoto"] : "profile.png";
        $this->views("discovery", $data);
        $this->views("template/down");
    }
    public function imagepost($post)
    {
        $data["postingan"] = $this->model("imagemodel")->getimage("SELECT file,deskripsi,sender FROM gallery WHERE imageid = $post");
        $data["judul"] = "post";
        $this->views("template/upper", $data);
        $profileimage = isset($_SESSION['id']) ? $_SESSION['id'] : 17;
        $this->views("template/upper", $data);
        $profileimage = isset($_SESSION['id']) ? $_SESSION['id'] : 17;
        $queryuser = $this->model("imagemodel")->getimage("SELECT profilephoto FROM user WHERE id = '$profileimage'");
        $data["profileimage"] = $queryuser["profilephoto"] ? $queryuser["profilephoto"] : "profile.png";
        $senderpp = $data["postingan"]["sender"];
        $queryts = $this->model("imagemodel")->getimage("SELECT profilephoto FROM user WHERE id = $senderpp");
        $data["userid"] = $this->model("imagemodel")->getimage("SELECT id FROM user WHERE id = $senderpp")["id"];
        $data["user"] = $this->model("imagemodel")->getimage("SELECT name FROM user WHERE id = $senderpp")["name"];
        $data["profilephoto"] = is_null($queryts["profilephoto"]) ? "profile.png" : $queryts["profilephoto"];
        // var_dump($data["profilephoto"]);
        $this->views("imagepost", $data);
        $this->views("template/down", $data);
    }

    public function category($tags){
        $data["image"] = $this->model("imagemodel")->getallimage("SELECT user.name,gallery.type,gallery.file,gallery.imageid,user.profilephoto from user join gallery on user.id = gallery.sender where type = '$tags'");
        $data["judul"] = $tags;
        $this->views("template/upper", $data);
        $data["rowcount"] = count($data["image"]);
        $profileimage = isset($_SESSION['id']) ? $_SESSION['id'] : 17;
        $queryuser = $this->model("imagemodel")->getimage("SELECT profilephoto FROM user WHERE id = '$profileimage'");
        $data["profileimage"] = $queryuser["profilephoto"] ? $queryuser["profilephoto"] : "profile.png";
        // var_dump($data["rowcount"]);
        $this->views("category", $data);
        $this->views("template/down", $data);
    }
}