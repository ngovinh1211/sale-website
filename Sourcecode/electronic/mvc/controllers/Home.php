<?php

class Home extends Controller{
    function home(){
        $url = $this->getUrl();
        
        // check user account
        $user = '';
        if($this->checkUserLogin()){
            $user = $_SESSION['currentUser'];
        }

        // set model
        $productModel = $this->model('ProductModel');

        //get header's information
        $category = $this->getCategory();
        $brand = $this->getBrand();

        // get product  
        $cellphones = $productModel->get10Cellphones();
        $tablet = $productModel->get10Tablet();
        $smartwatch = $productModel->get10Smartwatch();
        $earphone = $productModel->get10Earphone();

        // view 
        $this->view('user', [
            'component'=>'home',
            'title'=>'Home',
            'url'=>$url,
            'user'=>$user,
            'category'=>$category, // dữ liệu lưu vào biến $data['category']
            'brand'=>$brand, // dữ liệu lưu vào biến $data['brand']
            'cellphones'=>$cellphones,
            'tablet'=>$tablet,
            'smartwatch'=>$smartwatch,
            'earphone'=>$earphone,
        ]);
    }
}