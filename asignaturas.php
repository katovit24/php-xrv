<?php

    if($_SERVER['REQUEST_METHOD']== 'GET'){

        require_once("conexion.php");

        $id = $_GET['email'];


        $query = "SELECT asignaturas.asignatura, profesor.nombre
        FROM matricula
        JOIN asignaturas ON matricula.id_asignatura = asignaturas.id_asignatura
        JOIN profesor ON asignaturas.id_profesor = profesor.id_profesor
        JOIN usuarios on matricula.id_usuario = usuarios.id_usuario
        WHERE usuarios.email=  '$id'";
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