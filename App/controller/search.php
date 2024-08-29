<?php 
class Search extends controller{
    public function main(){
        $data["judul"] = "search";
        $this -> views("template/upper",$data);
        $this->views("search",$data);
        $this -> views("template/down",$data);
    }
  
}
?>