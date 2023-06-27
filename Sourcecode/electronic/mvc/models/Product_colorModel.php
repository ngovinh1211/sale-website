<?php

class Product_colorModel extends DB{
    public function checkProduct_color($product_id, $color_id){
        $sql = "select * from product_color where product_id = '$product_id' and color_id = '$color_id'";

        $data = $this->executeResult($sql);

        if($data == null || count($data) == 0){
            return true;
        }
        
        return false;
    }

    public function createProduct_color($product_id, $color_id){
        $sql = "insert into product_color(product_id, color_id)
                values
                ('$product_id','$color_id')";

        $this->execute($sql);
    }

    public function showProduct_color($product_id){
        $sql = "select color.id, product_color.product_id, product_color.color_id, color.color_name
                from product_color left join color on product_color.color_id = color.id
                where product_color.product_id = '$product_id'";

        $data = $this->executeResult($sql);

        return $data;
    }

    public function deleteProductColor($product_id){
        $sql = "delete from product_color where product_id = '$product_id'";

        $this->execute($sql);
    }
}

