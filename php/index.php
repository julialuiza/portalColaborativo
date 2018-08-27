<?php
    include("conectaBD.php");
    $query = "SELECT  * FROM noticia ORDER BY ID desc limit 20";
    $sql = $mysqli->query($query);
    if($sql){
        $array = [];
        while($row = $sql->fetch_assoc()){
            array_push($array, $row);
        }
        echo json_encode($array);
    }else{
        echo $mysqli->error;
    }
?>