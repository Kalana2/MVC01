<?php 

class Product extends Controller{

    public function index ($a = '', $b=''){
        echo "this is product controller ";

        $this->view('product/product');
    }
}

