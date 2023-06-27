<<?php

class CartModel extends DB{
    public function checkCart($account_id){
        $sql = "select * from product_order where account_id = '$account_id' and status = 'Pending'";

        $data = $this->executeResult($sql, true);

        return $data;
    }

    public function checkCartDetail($order_id, $product_id, $color_id, $storage_id){
        $sql = "select * from order_detail 
                where order_id = '$order_id'
                and product_id = '$product_id'
                and color_id = '$color_id' 
                and storage_id = '$storage_id'";
        
        $data = $this->executeResult($sql, true);

        return $data;
    }

    public function createCart($account_id){
        $sql = "insert into product_order(account_id, status)
                values
                ('$account_id', 'Pending')";

        $order_id = $this->execute($sql);

        return $order_id;
    }

    public function updateOrder($id, $status, $note, $order_date){
        $sql = "update product_order
                set note = '$note', order_date = '$order_date', status = '$status'
                where id = '$id'";

        $this->execute($sql);
    }

    public function addOrderDetail($order_id, $product_id, $color_id, $storage_id, $price, $quantity){
        $sql = "insert into order_detail(order_id, product_id, color_id, storage_id, price, quantity)
                values
                ('$order_id', '$product_id', '$color_id', '$storage_id', '$price', '$quantity')";

        $this->execute($sql);
    }

    public function updateQuantity($id, $quantity){
        $sql = "update order_detail set quantity = '$quantity' where id = '$id'";

        $this->execute($sql);
    }

    public function showPendingOrder($account_id){
        $sql = "select order_detail.id, order_detail.product_id, order_detail.color_id,order_detail.storage_id,
                order_detail.price, order_detail.quantity,
                product.thumbnail, product.title
                from product_order left join order_detail on product_order.id = order_detail.order_id
                left join product on product.id = order_detail.product_id
                where product_order.account_id = '$account_id' and product_order.status = 'pending'";

        $data = $this->executeResult($sql);

        return $data;
    }

    public function showAllOrdered(){
        $sql = "select product_order.id, product_order.note, product_order.order_date, account.email, account.fullname, account.phoneNo, account.address 
                from product_order left join account on product_order.account_id = account.id 
                where product_order.status = 'Ordered successfully'";

        $data = $this->executeResult($sql);

        return $data;
    }

    public function showOrdered($id){
        $sql = "select product_order.note, product_order.order_date, account.email, account.fullname, account.phoneNo, account.address 
                from product_order left join account on product_order.account_id = account.id 
                where product_order.status = 'Ordered successfully' and product_order.id = '$id'";

        $data = $this->executeResult($sql, true);

        return $data;
    }

    public function showOrderDetail($order_id){
        $sql = "select order_detail.product_id, order_detail.price, order_detail.quantity,
                product.title, product.thumbnail, order_detail.color_id, order_detail.storage_id, 
                category.category_name, brand.brand_name
                from order_detail left join product on order_detail.product_id = product.id
                left join category on category.id = product.category_id
                left join brand on brand.id = product.brand_id
                where order_id = '$order_id'";

        $data = $this->executeResult($sql);

        return $data;
    }

    public function deleteProduct($order_id){
        $sql = "delete from order_detail where id = '$order_id'";

        $this->execute($sql);
    }
}