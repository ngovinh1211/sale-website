<?php

class Product extends Controller{
    function product(){
        $url = $this->getUrl();

        // check user account
        $user = '';
        if($this->checkUserLogin()){
            $user = $_SESSION['currentUser'];
        }

        //get header's information
        $category = $this->getCategory();
        $brand = $this->getBrand();

        //get product
        $productModel = $this->model('ProductModel');
        $colorModel = $this->model('ColorModel');
        

        $product = $productModel->showProduct();
        $color = $colorModel->showColor();

        //view
        $this->view('user', [
            'component'=>'product',
            'title'=>'Product',
            'url'=>$url,
            'user'=>$user,
            'category'=>$category,
            'brand'=>$brand, 
            'color'=>$color,
            'product'=> $product
        ]);
    }

    function detail($id){
        $url = $this->getUrl();

        // check user account
        $user = '';
        if($this->checkUserLogin()){
            $user = $_SESSION['currentUser'];
        }
        
        //get header's information
        $category = $this->getCategory();
        $brand = $this->getBrand();

        //get product's detail
        $productModel = $this->model('ProductModel');
        $thumbnailModel = $this->model('ThumbnailModel');
        $product_colorModel = $this->model('Product_colorModel');
        $product_storageModel = $this->model('Product_storageModel');

        $product = $productModel->showProductDetail($id);
        $thumbnail = $thumbnailModel->getImg($id);
        $product_color = $product_colorModel->showProduct_color($id);
        $product_storage = $product_storageModel->showProductStorage($id);

        //view
        $this->view('user', [
            'component'=>'product-detail',
            'title'=>$product['title'],
            'url'=>$url,
            'user'=>$user,
            'category'=>$category,
            'brand'=>$brand, 
            'product'=>$product,
            'thumbnail'=>$thumbnail,
            'product_color'=>$product_color,
            'product_storage'=>$product_storage
        ]);
        
    }

    function category($id){
        $url = $this->getUrl();

        // check user account  
        $user = '';
        if($this->checkUserLogin()){
            $user = $_SESSION['currentUser'];
        }

        //get header's information
        $category = $this->getCategory();
        $brand = $this->getBrand();
        //get product
        $productModel = $this->model('ProductModel');
        $categoryModel = $this->model('CategoryModel');
        $colorModel = $this->model('ColorModel');

        $categoryDetail = $categoryModel->showCategoryDetail($id);
        $product = $productModel->showProductByCategory($id);
        $color = $colorModel->showColor();

        $this->view('user', [
            'component'=>'product',
            'title'=>$categoryDetail['category_name'],
            'url'=>$url,
            'user'=>$user,
            'category'=>$category, 
            'brand'=>$brand, 
            'color'=>$color,
            'product'=> $product
        ]);
        // header("Location: /project/product");
    }

    function brand($id){
        $url = $this->getUrl();

        // check user account
        $user = '';
        if($this->checkUserLogin()){
            $user = $_SESSION['currentUser'];
        }

        //get header's information
        $category = $this->getCategory();
        $brand = $this->getBrand();

        //get product
        $productModel = $this->model('ProductModel');
        $brandModel = $this->model('BrandModel');
        $colorModel = $this->model('ColorModel');

        $brandDetail = $brandModel->showBrandDetail($id);
        $product = $productModel->showProductByBrand($id);
        $color = $colorModel->showColor();

        $this->view('user', [
            'component'=>'product',
            'title'=>$brandDetail['brand_name'],
            'url'=>$url,
            'user'=>$user,
            'category'=>$category, 
            'brand'=>$brand, 
            'color'=>$color,
            'product'=> $product
        ]);
       
    }

   
}
?>