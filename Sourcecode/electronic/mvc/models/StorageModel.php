<?php

class StorageModel extends DB{
    public function checkStorage($storage_name){
        $sql = "select * from storage where storage_name = '$storage_name'";

        $data = $this->executeResult($sql);

        if($data == null || count($data) == 0){
            return true;
        }else{
            return false;
        }
    }

    public function showStorage(){
        $sql = "select * from storage";
        
        $data = $this->executeResult($sql);

        return $data;
    }

    public function showStorageDetail($id){
        $sql = "select * from storage where storage_name = '$id';";
        
        $data = $this->executeResult($sql, true);

        return $data;
    }
    public function showStorageDetail1($id){
        $sql = "select * from storage where id = '$id';";
        
        $data = $this->executeResult($sql, true);

        return $data;
    }

    public function addStorage($storage_name){
        $sql = "insert into storage(storage_name) values ('$storage_name')";

        $this->execute($sql);
    }

    public function editStorage($id, $storage_name){
        $sql = "update storage
                set storage_name = '$storage_name'
                where storage_name = '$id'";
        
        $this->execute($sql);
    }

    public function deleteStorage($id){
        $sql = "START TRANSACTION;
                    delete from product_storage where storage_id = '$id';
                    delete from storage where id = '$id';
                COMMIT;";

        mysqli_multi_query($this->con, $sql);
    }
}