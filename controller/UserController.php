<?php 

    if(isset($_POST['action'])){
        if($_POST['action'] == 'login'){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $opciones = [
                'cost' => 12,
            ];

            $usuario = new Usuario();
            $usuario->setEmail($email);
            $password = password_hash($password, PASSWORD_BCRYPT, $opciones);
            $usuario->setPassword($password);
            $data = $usuario->login();

            if(sizeof($data) > 0 ) {
                if(password_verify($_POST['password'], $data[0]["password"] )) {
                    header('Location: http://www.example.com/');
                    exit;
                }
            }
        }
    }

    function getUsuarios(){
        $usuario = new Usuario();
        $data = $usuario->getUsuarios();
        print_r($data);
    }