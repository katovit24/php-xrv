<?php

    if($_SERVER['REQUEST_METHOD']== 'GET'){

        require_once("conexion.php");

        $id = $_GET['email'];


        $query = "SELECT asignaturas.asignatura, notas.nota from asignaturas 
        join notas on asignaturas.id_asignatura = notas.id_asignatura
        join usuarios on usuarios.id_usuario = notas.id_usuario where email =  '$id'";
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