<?php

    if($_SERVER['REQUEST_METHOD']== 'GET'){

        require_once("conexion.php");

        $id = $_GET['email'];


        $query = "SELECT asignaturas.asignatura, clases.aula
        FROM asignaturas
        JOIN matricula ON asignaturas.id_asignatura = matricula.id_asignatura
        JOIN usuarios ON matricula.id_usuario = usuarios.id_usuario
        JOIN clases ON asignaturas.id_asignatura = clases.id_asignatura
        WHERE usuarios.email =  '$id'";
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