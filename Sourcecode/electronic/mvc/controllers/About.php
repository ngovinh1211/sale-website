<?php

class About extends Controller{
    function about(){
        $url = $this->getUrl();
        
        // check user account
        $user = '';
        if($this->checkUserLogin()){
            $user = $_SESSION['currentUser'];
        }

        //get header's information
        $category = $this->getCategory();
        $brand = $this->getBrand();
       

        //view
        $this->view('user', [
            'component'=>'about',
            'title'=>'About Us',
            'url'=>$url,
            'user'=>$user,
            'category'=>$category, // dữ liệu lưu vào biến $data['category']
            'brand'=>$brand, // dữ liệu lưu vào biến $data['brand']
            
        ]);
    }
}