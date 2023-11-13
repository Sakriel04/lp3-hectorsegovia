<?php

    $valid = $nombreErr = $apellidoErr = $emailErr = false;
    $setNombre = $setApellido = $setEmail = null;
    
    extract($_POST);
    if (isset($_POST["registrar"])) {
        $validName="/^[a-zA-Z ]*$/";
        $validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
        $uppercasePassword = "/(?=.*?[A-Z])/";
        $lowercasePassword = "/(?=.*?[a-z])/";
        $digitPassword = "/(?=.*?[0-9])/";
        $spacesPassword = "/^$|\s+/";
        $symbolPassword = "/(?=.*?[#?!@$%^&*-])/";
        $minEightPassword = "/.{8,}/";

        if (empty($nombre)) {
            $nombreErr = "Nombre es obligatorio";
        } elseif (!preg_match($validName, $nombre)) {
            $nombreErr = "No se aceptan números";
        } else {
            $nombreErr = true;
        }

        if (empty($apellido)) {
            $apellidoErr = "Apellido es obligatorio";
        } elseif (!preg_match($validName, $apellido)) {
            $apellidoErr = "No se aceptan números";
        } else {
            $apellidoErr = true;
        }

        if (empty($email)) {
            $emailErr = "Email es obligatorio";
        } elseif (!preg_match($validEmail, $email)) {
            $emailErr = "Formato no válido";
        } else {
            $emailErr = true;
        }

        if ($nombreErr==true && $apellidoErr==true && $emailErr==true) {
            $setNombre =  $nombre;
            $setApellido = $apellido;
            $setEmail = $email;
        }
        
    }


?>