<?php

class Product_storageModel extends DB{
    public function checkProduct_storage($product_id, $storage_id){
        $sql = "select * from product_storage where product_id = '$product_id' and storage_id = '$storage_id'";

        $data = $this->executeResult($sql);

        if($data == null || count($data) == 0){
            return true;
        }

        return false;
    }

    public function createProduct_storage($product_id, $storage_id){
        $sql = "insert into product_storage values
                ('$product_id', '$storage_id')";

        $this->execute($sql);
    }

    public function showProductStorage($product_id){
        $sql = "select storage.id, product_storage.product_id, product_storage.storage_id, storage.storage_name
                from product_storage left join storage on product_storage.storage_id = storage.id
                where product_storage.product_id = '$product_id'";

        $data = $this->executeResult($sql);

        return $data;
    }

    public function deleteProductStorage($product_id){
        $sql = "delete from product_storage where product_id = '$product_id'";

        $this->execute($sql);
    }
}
?>