<?php 

class Home extends Controller{

    public function index ($a = '', $b=''){
        echo "this is home controller ";

        $this->view('home');
    }
}

