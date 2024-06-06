<?php

    $mysql = new mysqli(
        "127.0.0.1:3307",
        "root",
        "",
        "xrv"
    );

    if ($mysql->connect_error){
        die("Failed to connect" . $mysql->connect_error);
    }