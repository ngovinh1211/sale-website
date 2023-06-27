<?php

class Admin extends Controller
{

    public $error;
    public $url;
    function __construct()
    {
        $this->url = $this->getUrl();
    }
    // Home
    function home(){
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
            die();
        }
        $admin = $_SESSION['currentAdmin'];
        
        $this->view('admin', [
            'component'=>'home',
            'title'=>'Home',
            'url'=>$this->url,
            'error'=>$this->error,
            'admin'=>$admin
        ]);
    }

    // Account
    function login()
    {
        if ($this->checkLogin()) {
            header("Location: $this->url/admin/home");
            die();
        }

        if (!empty($_POST)) {
            $email = $this->getPost('email');
            $pwd = $this->getMD5Security($this->getPost('pwd'));

            $accountModel = $this->model('AccountModel');
            $data = $accountModel->adminLogin($email, $pwd);

            if ($data == null) {
                $this->error = 'Login Failed';
                header("Refresh:1");
                die();
            }

            $_SESSION['currentAdmin'] = $data;

            $token = $this->getMD5Security($data['email'] . time() . $data['id']);

            setcookie('adminToken', $token, time() + 30 * 60, '/');

            $accountModel->createToken($token, $data['id']);

            header("Location: $this->url/admin/home");
        }

        $this->view('admin', [
            'component' => 'login',
            'title' => 'Admin Login',
            'url'=>$this->url,
            'error' => $this->error
        ]);
    }

    function register()
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        $account = $this->model('AccountModel');
        $role = $account->showRole();
    

        if (!empty($_POST)) {
            $role_id = $this->getPost('role_id');
            $fullname = $this->getPost('fullname');
            $email = $this->getPost('email');
            $phoneNo = $this->getPost('phoneNo');
            $address = $this->getPost('address');
            $pwd = $this->getMD5Security($this->getPost('pwd'));
            $created_at = date_create('now', timezone_open('Asia/Ho_Chi_Minh'))->format('Y-m-d H-i-s');

            if ($account->checkAccount($email)) {
                $account->createAccount($role_id, $pwd, $fullname, $address, $email, $phoneNo, $created_at);
            } else {
                $this->error = 'Account is exists';
            }
        }

        $this->view('admin', [
            'component' => 'register',
            'title' => 'Account Register',
            'url'=>$this->url,
            'role' => $role,
            'error' => $this->error,
            'admin'=>$admin
        ]);
    }

    function logout()
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        unset($_SESSION['currentAdmin']);
        setcookie('adminToken', '', time(), "/");

        header("Location: $this->url/admin");
    }

    function adminAccount()
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        $accountModel = $this->model('AccountModel');
        $data = $accountModel->showAdminAccount();

        $this->view('admin', [
            'component' => 'account',
            'title' => 'Admin Accounts',
            'url'=>$this->url,
            'account' => $data,
            'admin'=>$admin
        ]);
    }

    function userAccount()
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        $accountModel = $this->model('AccountModel');
        $data = $accountModel->showUserAccount();

        $this->view('admin', [
            'component' => 'account',
            'title' => 'User Account',
            'url'=>$this->url,
            'account' => $data,
            'admin'=>$admin
        ]);
    }

    function editAccount($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        $accountModel = $this->model('AccountModel');
        $data = $accountModel->showAccountDetail($id);

        if (!empty($_POST)) {
            $email = $this->getPost('email');
            $fullname = $this->getPost('fullname');
            $phoneNo = $this->getPost('phoneNo');
            $address = $this->getPost('address');
            $updated_at = date_create('now', timezone_open('Asia/Ho_Chi_Minh'))->format('Y-m-d H-i-s');

            if ($accountModel->checkUpdateAccount($id, $email)) {
                $accountModel->editAccount($id, $email, $fullname, $phoneNo, $address, $updated_at);

                if ($_POST['pwd'] != null) {
                    $pwd = $this->getMD5Security($this->getPost('pwd'));

                    $accountModel->changePwd($id, $pwd);
                }

                if ($data['role'] == 'user') {
                    header("Location: $this->url/admin/userAccount");
                } else {
                    header("Location: $this->url/admin/adminAccount");
                }
            } else {
                $this->error = 'Account is exists';
            }
        }
        $this->view('admin', [
            'component' => 'editAccount',
            'title' => 'Edit Account',
            'url'=>$this->url,
            'error' => $this->error,
            'admin'=>$admin,
            'account' => $data
        ]);
    }

    function deleteAccount($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $accountModel = $this->model('AccountModel');

        $accountModel->deleteAccount($id);

        header("Location: $this->url/admin/adminAccount");
    }

    // Category
    function category()
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        $categoryModel = $this->model('CategoryModel');

        if (!empty($_POST)) {
            $category_name = $this->getPost('category');

            if ($categoryModel->checkCategory($category_name)) {
                $categoryModel->addCategory($category_name);
            } else {
                $this->error = 'Category already exists';
            }
        }

        $data = $categoryModel->showCategory();

        $this->view('admin', [
            'component' => 'category',
            'title' => 'Category',
            'url'=>$this->url,
            'admin'=>$admin,
            'category' => $data,
            'error' => $this->error
        ]);
    }

    function editCategory($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        $categoryModel = $this->model('categoryModel');

        $data = $categoryModel->showCategoryDetail($id);

        if (!empty($_POST)) {
            $category_name = $this->getPost('category');

            if ($categoryModel->checkCategory($category_name)) {
                $categoryModel->editCategory($id, $category_name);
                header("Location: $this->url/admin/category");
            } else {
                $this->error = 'Category already exists';
            }
        }

        $this->view('admin', [
            'component' => 'editCategory',
            'title' => 'Edit Category',
            'url'=>$this->url,
            'admin'=>$admin,
            'category' => $data,
            'error' => $this->error
        ]);
    }

    function deleteCategory($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $categoryModel = $this->model('CategoryModel');

        if($categoryModel->checkProduct($id) != null){
            $this->error = "This category cannot be deleted because there are already attached products!!";
            header("Location: $this->url/admin/category");
            die();
        }

        $categoryModel->deleteCategory($id);

        header("Location: $this->url/admin/category");
    }

    // Color
    function color()
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        $colorModel = $this->model('ColorModel');

        if (!empty($_POST)) {
            $color_name = $this->getPost('color');

            if ($colorModel->checkColor($color_name)) {
                $colorModel->addColor($color_name);
            } else {
                $this->error = 'Color already exists!';
            }
        }
        $data = $colorModel->showColor();

        $this->view('admin', [
            'component' => 'color',
            'title' => 'Color',
            'url'=>$this->url,
            'admin'=>$admin,
            'color' => $data,
            'error' => $this->error
        ]);
    }

    function editColor($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        $colorModel = $this->model('ColorModel');

        $data = $colorModel->showColorDetail($id);

        if (!empty($_POST)) {
            $color_name = $this->getPost('color');

            if ($colorModel->checkColor($color_name)) {
                $colorModel->editColor($id, $color_name);
                header("Location: $this->url/admin/color");
            } else {
                $this->error = 'Color already exists!';
            }
        }

        $this->view('admin', [
            'component' => 'editColor',
            'title' => 'Edit Color',
            'url'=>$this->url,
            'admin'=>$admin,
            'color'=>$data,
            'error' => $this->error
            
        ]);
    }

    function deleteColor($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $colorModel = $this->model('ColorModel');

        $colorModel->deleteColor($id);

        header("Location: $this->url/admin/color");
    }

   

    // Brand
    function brand()
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        $brandModel = $this->model('BrandModel');

        if (!empty($_POST)) {
            $brand_name = $this->getPost('brand');

            if ($brandModel->checkBrand($brand_name)) {
                $brandModel->addBrand($brand_name);
            } else {
                $this->error = 'Brand already exists!';
            }
        }

        $data = $brandModel->showBrand();

        $this->view('admin', [
            'component' => 'brand',
            'title' => 'Brand',
            'url'=>$this->url,
            'admin'=>$admin,
            'brand' => $data,
            'error' => $this->error
        ]);
    }

    function editBrand($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        $brandModel = $this->model('BrandModel');

        $data = $brandModel->showBrandDetail($id);

        if (!empty($_POST)) {
            $brand_name = $this->getPost('brand');

            if ($brandModel->checkBrand($brand_name)) {
                $brandModel->editBrand($id, $brand_name);
                header("Location: $this->url/admin/brand");
            } else {
                $this->error = 'Brand already exists!';
            }
        }

        $this->view('admin', [
            'component' => 'editBrand',
            'title' => 'Edit Brand',
            'url'=>$this->url,
            'admin'=>$admin,
            'brand' => $data,
            'error' => $this->error
        ]);
    }

    function deleteBrand($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $brandModel = $this->model('brandModel');

        if($brandModel->checkProductBrand($id) != null){
            $this->error = "Can't delete the brand";
            header("Location: $this->url/admin/brand");
            die();
        }
        
        $brandModel->deleteBrand($id);
        
        header("Location: $this->url/admin/brand");
    }

    // Storage
    function storage()
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        $categoryModel = $this->model('CategoryModel');
        $storageModel = $this->model('StorageModel');
        $category = $categoryModel->showCategory();

        if (!empty($_POST)) {
            $category_id = $this->getPost('category_id');
            $storage = $this->getPost('storage');

            if ($storageModel->checkStorage($storage, $category_id)) {
                $storageModel->addStorage($storage, $category_id);
            } else {
                $this->error = "storage already exists";
            }
        }

        $storage = $storageModel->showStorage();

        $this->view('admin', [
            'component' => 'storage',
            'title' => 'Storage',
            'url'=>$this->url,
            'admin'=>$admin,
            'category' => $category,
            'storage' => $storage,
            'error' => $this->error
        ]);
    }

    function editStorage($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        $storageModel = $this->model('StorageModel');
        $categoryModel = $this->model('CategoryModel');

        $data = $storageModel->showStorageDetail($id);
        $category = $categoryModel->showCategory();

        if (!empty($_POST)) {
            $storage = $this->getPost('storage');
            $category_id = $this->getPost('category_id');

            if ($storageModel->checkStorage($storage, $category_id)) {
                $storageModel->editStorage($id, $storage, $category_id);
                header("Location: $this->url/admin/storage");
            } else {
                $this->error = "Storage already exists";
            }
        }

        $this->view('admin', [
            'component' => 'editStorage',
            'title' => 'Edit Storage',
            'url'=>$this->url,
            'admin'=>$admin,
            'error' => $this->error,
            'storage' => $data,
            'category' => $category
        ]);
    }

    function deleteStorage($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $storageModel = $this->model('StorageModel');

        $storageModel->deleteStorage($id);

        header("Location: $this->url/admin/storage");
    }

    // Product
    function product()
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        $productModel = $this->model('ProductModel');

        $product = $productModel->showProduct();

        $this->view('admin', [
            'component' => 'product',
            'title' => 'Product',
            'url'=>$this->url,
            'admin'=>$admin,
            'product' => $product
        ]);
    }

    function createProduct()
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        $productModel = $this->model('ProductModel');
        $product_colorModel = $this->model('Product_colorModel');
        $product_storageModel = $this->model('Product_storageModel');

        $brand = $this->model('BrandModel')->showBrand();
        $category = $this->model('CategoryModel')->showCategory();
        $color = $this->model('ColorModel')->showColor();
        $storage = $this->model('StorageModel')->showStorage();

        if (!empty($_POST)) {
            $title = $this->getPost('title');
            $description = $this->getPost('description');
            $price = $this->getPost('price');
            $category_id = $_POST['category_id'];
            $brand_id = $_POST['brand_id'];
            $created_at = date_create('now', timezone_open('Asia/Ho_Chi_Minh'))->format('Y-m-d H-i-s');

            $image = $_FILES['img']['name'];
            $image_tmp_name = $_FILES['img']['tmp_name'];
            $image_folder = './public/img/product/' . $image;

            if (!($productModel->checkProduct($title))) {
                $this->error = 'Product already exists';
                header("Location: $this->url/admin/createProduct");
                die();
            }

            if ($_FILES['img']['error'] > 0) {
                $this->error = 'Upload file failed';
                header("Location: $this->url/admin/createProduct");
                die();
            }

            if (!is_file($image_folder)) {
                move_uploaded_file($image_tmp_name, $image_folder);
            }
            $product_id = $productModel->createProduct($title, $description, $image_folder, $price, $category_id, $brand_id, $created_at);

            if (isset($_POST['color']) && count($_POST['color']) != 0) {
                $productColor = $_POST['color'];

                for ($i = 0; $i < count($productColor); $i++) {
                    if ($product_colorModel->checkProduct_color($product_id, $productColor[$i])) {
                        $product_colorModel->createProduct_color($product_id, $productColor[$i]);
                    }
                }
            }

            if (isset($_POST['storage']) && count($_POST['storage']) != 0) {
                $productStorage = $_POST['storage'];

                for ($i = 0; $i < count($productStorage); $i++) {
                    if ($product_storageModel->checkProduct_storage($product_id, $productStorage[$i])) {
                        $product_storageModel->createProduct_storage($product_id, $productStorage[$i]);
                    }
                }
            }

            header("Location: $this->url/admin/productDetail/$product_id");
        }

        $this->view('admin', [
            'component' => 'createProduct',
            'title' => 'Create Product',
            'url'=>$this->url,
            'admin'=>$admin,
            'brand' => $brand,
            'category' => $category,
            'color' => $color,
            'storage' => $storage,
            'error' => $this->error
        ]);
    }

    function productDetail($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        // get Model
        $productModel = $this->model('ProductModel');
        $product_storageModel = $this->model('Product_storageModel');
        $product_colorModel = $this->model('Product_colorModel');
        $thumbnailModel = $this->model('ThumbnailModel');

        // get product's information
        $product = $productModel->showProductDetail($id);
        $product_storage = $product_storageModel->showProductStorage($id);
        $product_color = $product_colorModel->showProduct_color($id);
        $thumbnail = $thumbnailModel->getImg($id);

        // get information
        $brand = $this->model('BrandModel')->showBrand();
        $category = $this->model('CategoryModel')->showCategory();
        $color = $this->model('ColorModel')->showColor();
        $storage = $this->model('StorageModel')->showStorage();

        $this->view('admin', [
            'component' => 'productDetail',
            'title' => $product['title'],
            'url'=>$this->url,
            'admin'=>$admin,
            'error' => $this->error,
            'product' => $product,
            'product_storage' => $product_storage,
            'product_color' => $product_color,
            'thumbnail' => $thumbnail,
            'brand' => $brand,
            'category' => $category,
            'color' => $color,
            'storage' => $storage
        ]);
    }

    function editProductTitle($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $productModel = $this->model('ProductModel');

        if (!empty($_POST)) {
            $title = $this->getPost('title');
            $updated_at = date_create('now', timezone_open('Asia/Ho_Chi_Minh'))->format('Y-m-d H-i-s');

            if (!$productModel->checkProduct($title)) {
                $this->error = "This product already exists!";
                header("Location: $this->url/admin/productDetail/$id");
            } else {
                $productModel->editProductTitle($id, $title, $updated_at);
                header("Location: $this->url/admin/productDetail/$id");
            }
        }
    }

    function editMainThumbnail($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $productModel = $this->model('ProductModel');

        $updated_at = date_create('now', timezone_open('Asia/Ho_Chi_Minh'))->format('Y-m-d H-i-s');
        $image = $_FILES['img']['name'];
        $image_tmp_name = $_FILES['img']['tmp_name'];
        $image_folder = './public/img/product/' . $image;

        if ($_FILES['img']['error'] > 0) {
            $this->error = 'Upload file failed';
            header("Location: $this->url/admin/productDetail/$id");
            die();
        }

        if (!is_file($image_folder)) {
            move_uploaded_file($image_tmp_name, $image_folder);
        }

        $data = $productModel->getImg($id);
        $productModel->editProductThumbnail($id, $image_folder, $updated_at);

        if ($image_folder != $data['thumbnail']) {
            if (is_file($data['thumbnail'])) {
                unlink($data['thumbnail']);
            }
        }

        header("Location: $this->url/admin/productDetail/$id");
    }

    function addSupportingThumbnail($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $thumbnailModel = $this->model('ThumbnailModel');

        $image = $_FILES['spimg']['name'];
        $image_tmp_name = $_FILES['spimg']['tmp_name'];
        $image_folder = './public/img/product/' . $image;

        if ($_FILES['img']['error'] > 0) {
            $this->error = 'Upload file failed';
            header("Location: $this->url/admin/productDetail/$id");
            die();
        }

        if (!is_file($image_folder)) {
            move_uploaded_file($image_tmp_name, $image_folder);
        }

        $thumbnailModel->addThumbnail($id, $image_folder);

        header("Location: $this->url/admin/productDetail/$id");
    }

    function deleteSupportingThumbnail($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $thumbnailModel = $this->model('ThumbnailModel');

        $data = $thumbnailModel->getThumbnail($id);
        $thumbnailModel->deleteThumbnail($id);

        $product_id = $data['product_id'];
        if (is_file($data['thumbnail'])) {
            unlink($data['thumbnail']);
        }

        header("Location: $this->url/admin/productDetail/$product_id");
    }

    function editProductDescription($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $productModel = $this->model('ProductModel');

        if (!empty($_POST)) {
            $description = $this->getPost('description');
            $updated_at = date_create('now', timezone_open('Asia/Ho_Chi_Minh'))->format('Y-m-d H-i-s');

            $productModel->editProductDescription($id, $description, $updated_at);
            header("Location: $this->url/admin/productDetail/$id");
        }
    }

    function editProductPrice($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $productModel = $this->model('ProductModel');

        if (!empty($_POST)) {
            $price = $this->getPost('price');
            $updated_at = date_create('now', timezone_open('Asia/Ho_Chi_Minh'))->format('Y-m-d H-i-s');

            $productModel->editProductPrice($id, $price, $updated_at);
            header("Location: $this->url/admin/productDetail/$id");
        }
    }

    function editProductCategory($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $productModel = $this->model('ProductModel');

        if (!empty($_POST)) {
            $category_id = $this->getPost('category_id');
            $updated_at = date_create('now', timezone_open('Asia/Ho_Chi_Minh'))->format('Y-m-d H-i-s');

            $productModel->editProductCategory($id, $category_id, $updated_at);
            header("Location: $this->url/admin/productDetail/$id");
        }
    }

    function editProductBrand($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $productModel = $this->model('ProductModel');

        if (!empty($_POST)) {
            $brand_id = $this->getPost('brand_id');
            $updated_at = date_create('now', timezone_open('Asia/Ho_Chi_Minh'))->format('Y-m-d H-i-s');

            $productModel->editProductBrand($id, $brand_id, $updated_at);
            header("Location: $this->url/admin/productDetail/$id");
        }
    }
    function editProductStorage($id){
    
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $product_storageModel = $this->model('Product_storageModel');
        $productModel = $this->model('ProductModel');

        if (!empty($_POST)) {
            $productStorage = $_POST['storage'];
            $updated_at = date_create('now', timezone_open('Asia/Ho_Chi_Minh'))->format('Y-m-d H-i-s');

            $product_storageModel->deleteProductStorage($id);

            for ($i = 0; $i < count($productStorage); $i++) {
                if ($product_storageModel->checkProduct_storage($id, $productStorage[$i])) {
                    $product_storageModel->createProduct_storage($id, $productStorage[$i]);
                }
            }

            $productModel->editUpdatedAt($id, $updated_at);

            header("Location: $this->url/admin/productDetail/$id");
        }
    }

    function editProductColor($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $product_colorModel = $this->model('Product_colorModel');
        $productModel = $this->model('ProductModel');

        if (!empty($_POST)) {
            $productColor = $_POST['color'];
            $updated_at = date_create('now', timezone_open('Asia/Ho_Chi_Minh'))->format('Y-m-d H-i-s');

            $product_colorModel->deleteProductColor($id);

            for ($i = 0; $i < count($productColor); $i++) {
                if ($product_colorModel->checkProduct_color($id, $productColor[$i])) {
                    $product_colorModel->createProduct_color($id, $productColor[$i]);
                }
            }

            $productModel->editUpdatedAt($id, $updated_at);

            header("Location: $this->url/admin/productDetail/$id");
        }
    }

    function deleteProduct($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $productModel = $this->model('ProductModel');
        $deleted_at = date_create('now', timezone_open('Asia/Ho_Chi_Minh'))->format('Y-m-d H-i-s');
        $productModel->softDeleteProduct($id, $deleted_at);

        header("Location: $this->url/admin/product");
    }

    // Recycle
    function recycle()
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        $productModel = $this->model('ProductModel');
        $data = $productModel->showDeletedProduct();

        $this->view('admin', [
            'component' => 'recycle',
            'title' => 'Recycle Bin',
            'url'=>$this->url,
            'admin'=>$admin,
            'deletedProduct' => $data
        ]);
    }

    function restoreProduct($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $productModel = $this->model('ProductModel');
        $productModel->restoreProduct($id);

        header("Location: $this->url/admin/product");
    }

    function destroyProduct($id)
    {
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }

        $productModel = $this->model('ProductModel');
        $thumbnailModel = $this->model('ThumbnailModel');

        // delete main image
        $data = $productModel->getImg($id);
        $imgUrl = $data['thumbnail'];

        if (is_file($imgUrl)) {
            unlink($imgUrl);
        }

        // delete supporting image
        $data = $thumbnailModel->getImg($id);
        foreach ($data as $imgUrl) {
            if (is_file($imgUrl['thumbnail'])) {
                unlink($imgUrl['thumbnail']);
            }
        }

        $productModel->destroyProduct($id);

        header("Location: $this->url/admin/recycle");
    }

    // Order
    function order(){
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        // get model
        $cartModel = $this->model('CartModel');

        $data = $cartModel->showAllOrdered();


        $this->view('admin', [
            'component'=>'order',
            'title'=>'Ordered Product',
            'url'=>$this->url,
            'admin'=>$admin,
            'order'=>$data
        ]);
    }

    function orderDetail($order_id){
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        // get model
        $cartModel = $this->model('CartModel');

        $order = $cartModel->showOrdered($order_id);
        $orderDetail = $cartModel->showOrderDetail($order_id);

        $this->view('admin', [
            'component'=>'orderDetail',
            'title'=>'Order Detail',
            'url'=>$this->url,
            'admin'=>$admin,
            'order'=>$order,
            'orderDetail'=>$orderDetail
        ]);
    }

    function feedback(){
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        // get model
        $feedbackModel = $this->model('FeedbackModel');
        $feedback = $feedbackModel->showFeedback();

        $this->view('admin', [
            'component'=>'feedback',
            'title'=>'Feedback',
            'url'=>$this->url,
            'admin'=>$admin,
            'feedback'=>$feedback
        ]);
    }

    function feedbackDetail($id){
        if (!$this->checkLogin()) {
            header("Location: $this->url/admin");
        }
        $admin = $_SESSION['currentAdmin'];

        // get model
        $feedbackModel = $this->model('FeedbackModel');

        $feedbackModel->readFeedback($id);
        $feedback = $feedbackModel->showFeedbackDetail($id);

        $this->view('admin', [
            'component'=>'feedbackDetail',
            'title'=>'Feedback Detail',
            'url'=>$this->url,
            'admin'=>$admin,
            'feedback'=>$feedback
        ]);
    }
}