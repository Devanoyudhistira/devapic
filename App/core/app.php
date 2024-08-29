<?php
class App
{
    protected $method = "main",
    $controller = "discovery",
    $arguments = [];

    public function parseurl()
    {
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }
    public function __construct()
    
    {
        $url = $this->parseurl();
        if ($url !== null && file_exists("App/controller/" . $url[0] . ".php")) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once("App/controller/" . $this->controller . ".php");
        if(isset($url[1])){
            if(method_exists($this->controller,$url[1])){
                $this->method = $url[1];
                unset($url[1]);
            };
        };
        $this->controller = new $this->controller;
        if(!empty($url)){
            $this -> arguments = array_values($url);
        }
        call_user_func_array([$this-> controller,$this -> method],$this-> arguments);
    }
   
}
?>