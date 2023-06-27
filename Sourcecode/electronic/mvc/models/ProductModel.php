<?php

class ProductModel extends DB{
    public function checkProduct($title){
        $sql = "select title from product where title = '$title'";
        
        $data = $this->executeResult($sql);

        if($data == null || count($data) == 0){
            return true;
        }else{
            return false;
        }
    }

    public function getImg($id){
        $sql = "select thumbnail from product where id = '$id'";

        $data = $this->executeResult($sql, true);

        return $data;
    }

    public function createProduct($title, $description, $thumbnail, $price, $category_id, $brand_id, $created_at){
        $sql = "insert into product(title, description, thumbnail, price, category_id, brand_id, created_at)
                values
                ('$title', '$description', '$thumbnail', '$price', '$category_id', '$brand_id', '$created_at')";
        
        $id = $this->execute($sql);

        return $id;
    }

    public function showProduct(){
        $sql = "select product.id, product.title, product.description, product.thumbnail, product.price,
                product.updated_at, category.category_name, brand.brand_name 
                from product left join category on product.category_id = category.id 
                left join brand on product.brand_id = brand.id
                where product.soft_delete = 0 order by created_at desc";

        $data = $this->executeResult($sql);

        return $data;
    }

    public function showProductByCategory($category_id){
        $sql = "select product.id, product.title, product.description, product.thumbnail, product.price,
                product.updated_at, category.category_name, brand.brand_name 
                from product left join category on product.category_id = category.id 
                left join brand on product.brand_id = brand.id
                where product.soft_delete = 0
                and product.category_id = '$category_id' order by created_at desc";

        $data = $this->executeResult($sql);

        return $data;
    }

    public function showProductByBrand($brand_id){
        $sql = "select product.id, product.title, product.description, product.thumbnail, product.price,
                product.updated_at, category.category_name, brand.brand_name 
                from product left join category on product.category_id = category.id 
                left join brand on product.brand_id = brand.id
                where product.soft_delete = 0
                and product.brand_id = '$brand_id' order by created_at desc";

        $data = $this->executeResult($sql);

        return $data;
    }

    public function showDeletedProduct(){
        $sql = "select product.id, product.title, product.description, product.thumbnail, product.price,
                product.deleted_at, category.category_name, brand.brand_name
                from product left join category on product.category_id = category.id 
                left join brand on product.brand_id = brand.id
                where product.soft_delete = 1
                order by deleted_at desc";

        $data = $this->executeResult($sql);

        return $data;
    }

    public function showProductDetail($id){
        $sql = "select product.id, product.title, product.description, product.thumbnail, product.price, 
                product.updated_at, product.category_id, product.brand_id,
                category.category_name, brand.brand_name 
                from product left join category on product.category_id = category.id 
                left join brand on product.brand_id = brand.id
                where product.soft_delete = 0
                and product.id = '$id'";

        $data = $this->executeResult($sql, true);

        return $data;
    }

    public function editProductTitle($id, $title, $updated_at){
        $sql = "update product set title = '$title', updated_at = '$updated_at' where id = '$id'";

        $this->execute($sql);
    }

    public function editProductDescription($id, $description, $updated_at){
        $sql = "update product set description = '$description', updated_at = '$updated_at' where id = '$id'";

        $this->execute($sql);
    }

    public function editProductThumbnail($id, $thumbnail, $updated_at){
        $sql = "update product set thumbnail = '$thumbnail', updated_at = '$updated_at' where id = '$id'";

        $this->execute($sql);
    }
    public function editProductPrice($id, $price, $updated_at){
        $sql = "update product set price = '$price', updated_at = '$updated_at' where id = '$id'";

        $this->execute($sql);
    }

    public function editProductCategory($id, $category_id, $updated_at){
        $sql = "update product set category_id = '$category_id', updated_at = '$updated_at' where id = '$id'";

        $this->execute($sql);
    }

    public function editProductBrand($id, $brand_id, $updated_at){
        $sql = "update product set brand_id = '$brand_id', updated_at = '$updated_at' where id = '$id'";

        $this->execute($sql);
    }

    public function editUpdatedAt($id, $updated_at){
        $sql = "update product set updated_at = '$updated_at' where id = '$id'";

        $this->execute($sql);
    }

    public function softDeleteProduct($id, $deleted_at){
        $sql = "update product 
                set soft_delete = 1, deleted_at = '$deleted_at'
                where id = '$id'";

        $this->execute($sql);
    }   

    public function restoreProduct($id){
        $sql = "update product
                set soft_delete = 0, deleted_at = null
                where id = '$id'";
        
        $this->execute($sql);
    }

    public function destroyProduct($id){
        $sql = "START TRANSACTION;
                    delete from product_storage where product_id = '$id';
                    delete from product_color where product_id = '$id';
                    delete from thumbnail where product_id = '$id';
                    delete from product where id = '$id';
                COMMIT;";

        mysqli_multi_query($this->con, $sql);
    }

    public function get10Cellphones(){
        $sql = "select product.id, product.title, product.description, product.thumbnail, product.price,
                product.updated_at, category.category_name, brand.brand_name
                from product left join category on product.category_id = category.id 
                left join brand on product.brand_id = brand.id
                where product.soft_delete = 0 and category_name = 'Cellphones'
                order by created_at desc
                limit 10";

        $data = $this->executeResult($sql);

        return $data;
    }

    public function get10Tablet(){
        $sql = "select product.id, product.title, product.description, product.thumbnail, product.price,
                product.updated_at, category.category_name, brand.brand_name 
                from product left join category on product.category_id = category.id 
                left join brand on product.brand_id = brand.id
                where product.soft_delete = 0 and category_name = 'Tablet'
                order by created_at desc
                limit 10";

        $data = $this->executeResult($sql);

        return $data;
    }

    public function get10Smartwatch(){
        $sql = "select product.id, product.title, product.description, product.thumbnail, product.price,
                product.updated_at, category.category_name, brand.brand_name 
                from product left join category on product.category_id = category.id 
                left join brand on product.brand_id = brand.id
                where product.soft_delete = 0 and category_name = 'Smartwatch'
                order by created_at desc
                limit 10";

        $data = $this->executeResult($sql);

        return $data;
    }

    public function get10Earphone(){
        $sql = "select product.id, product.title, product.description, product.thumbnail, product.price,
                product.updated_at, category.category_name, brand.brand_name 
                from product left join category on product.category_id = category.id 
                left join brand on product.brand_id = brand.id
                where product.soft_delete = 0 and category_name = 'Earphone'
                order by created_at desc
                limit 10";

        $data = $this->executeResult($sql);

        return $data;
    }
}
?>