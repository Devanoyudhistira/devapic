<?php 
class imagemodel extends databases{
    private $db;
    public function __construct() {
        $this -> db = new databases;
    }

    public function getallimage($query){
        $this->db->query($query);
        return $this->db->allresult() ;
    }
    public function getimage($query){
        $this->db->query($query);
        return $this->db->result() ;
    }

    public function addimage($data,$gambar,$id){
        $query = "INSERT INTO gallery VALUES (:id,:deskripsi,:type,:file,:sender)";
        $this->db->query($query);
        $this->db->bind('id',0);
        $this->db->bind('deskripsi',htmlspecialchars($data["description"]));
        $this->db->bind('type',htmlspecialchars($data["tags"]));
        $this->db->bind('file',$gambar);
        $this->db->bind('sender',$id);
        $this->db->execute();
    }
    public function deleteimage($id,$sender){
        $query = "DELETE FROM gallery where imageid = $id && sender = $sender";
        $this -> db -> query($query);
        $this -> db -> execute();
    }
    public function updateimage($query){
        $this -> db -> query($query);
        $this -> db -> execute();
    }
}
?>