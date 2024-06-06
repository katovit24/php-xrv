<?php

    if($_SERVER['REQUEST_METHOD']== 'GET'){

        require_once("conexion.php");

        $id = $_GET['email'];


        $query = "SELECT * FROM usuarios WHERE usuarios.email =  '$id'";
        $result = $mysql -> query($query);

        if ($mysql->affected_rows > 0){
            while($row = $result->fetch_assoc()){
                $array[] = $row;
            }
            echo json_encode($array);

        }else{
            echo "not found any rows";
        }

        $result->close();
        $mysql -> close();
    }