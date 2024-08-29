<?php 
class controller{
    public function views($page,$data = []){
        require_once("App/views/" . $page . ".php");
    }

    public function model($page){
        require_once("App/models/" . $page . ".php");
        return new $page;
    }
}
?>