<?php

    if($_SERVER['REQUEST_METHOD']== 'POST'){

        require_once("xrvdb.php");

        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];
        
        $query = "INSERT INTO usuarios (nombre, email, apellido1, apellido2, contrasena) VALUES ('$nombre','$email', '$apellido1', '$apellido2', '$contrasena')"; 
        $result = $mysql->query($query);

        if ($result==TRUE){
            echo "the user was created successfully";
        }else{
            echo"Error";
        }

        $mysql->close();
    }