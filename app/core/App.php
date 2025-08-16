<?php


Class App{  
    private $controller = 'Home';
    private $method = 'index';  

    private function splitURl(){
        $URL = $_GET["url"] ?? 'home';
        $URL = explode("/",$URL);
        return $URL;
    } 
    
    public function loadControler(){

        $URL = $this->splitURl();
        
        $fileName = "../app/controllers/".ucfirst($URL[0]).".php";  

        if (file_exists($fileName)){
            require $fileName;
            $this->controller = ucfirst($URL[0]);
        
        }else{
            
            $fileName = "../app/controllers/".$URL[0]
            ."/".ucfirst($URL[0]).".php";    
            print_r($fileName);
            if (file_exists($fileName)){
            require $fileName;
            $this->controller = ucfirst($URL[0]);
            }

            $fileName = "../app/controllers/_404.php";
            require $fileName;
            $this->controller = '_404';
        }

        $controller  = new $this->controller;
        call_user_func_array([$controller, $this->method], []);
    }
}
