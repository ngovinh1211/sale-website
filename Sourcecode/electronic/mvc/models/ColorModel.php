<?php

class ColorModel extends DB{
    public function checkColor($color_name){
        $sql = "select * from color where color_name = '$color_name'";

        $data = $this->executeResult($sql);

        if($data == null || count($data) == 0){
            return true;
        }else{
            return false;
        }
    }

    public function addColor($color_name){
        $sql = "insert into color(color_name) values ('$color_name')";

        $this->execute($sql);
    }

    public function showColor(){
        $sql = "select * from color";

        $data = $this->executeResult($sql);

        return $data;
    }

    public function showColorDetail($id){
        $sql = "select * from color where color_name = '$id'";

        $data = $this->executeResult($sql, true);

        return $data;
    }
    public function showColorDetail1($id){
        $sql = "select * from color where id = '$id'";

        $data = $this->executeResult($sql, true);

        return $data;
    }

    public function editColor($id, $color_name){
        $sql = "update color set color_name = '$color_name' where color_name = '$id'";

        $this->execute($sql);
    }

    public function deleteColor($id){
        $sql = "START TRANSACTION;
                    delete from product_color where color_id = '$id';
                    delete from color where id = '$id';
                COMMIT;";

        mysqli_multi_query($this->con, $sql);
    }
}