<?php
    require_once 'Bd.php';
    class Usuario extends Db{

        private $_id;
        private $_nombre;
        private $_apellido;
        private $_edad;
        private $_email;
        private $_pais;
        private $_curso;
        private $_contraseña;
        
        function __construct(){

        }  

        function getNombre(){
            return $this->_nombre;
        }

        function setNombre($nombre){
            $this->_nombre = $nombre;
        }

        function getApellido(){
            return $this->_apellido;
        }

        function setApellido($apellido){
            $this->_apellido = $apellido;
        }

        function getEdad(){
            return $this->_edad;
        }

        function setEdad($edad){
            $this->_edad = $edad;
        }

        function getEmail(){
            return $this->_email;
        }

        function setEmail($email){
            $this->_email = $email;
        }

        function getPais(){
            return $this->_pais;
        }

        function setPais($pais){
            $this->_pais = $pais;
        }

        function getCurso(){
            return $this->_curso;
        }

        function setCurso($curso){
            $this->_curso = $curso;
        }

        function getPassword(){
            return $this->_password;
        }

        function setPassword($password){
            $this->_password = $password;
        }

        // Metodos BD
        function login(){

            $pdo = $this->connect();
            $pdo->beginTransaction();
            
            $stmt = $pdo->prepare("SELECT * FROM usuarios where email = ? limit 1");
            $stmt->bindParam(1, $this->_email);
            $stmt->execute();
            
            $resultado = $stmt->fetchAll();
            return $resultado;
        }

        function getUsuarios(){
            $pdo = $this->connect();
            $pdo->beginTransaction();
            
            $stmt = $pdo->prepare("SELECT id,nombre,apellido,email,edad,pais,curso FROM usuarios ");
            $stmt->execute();
            
            $resultado = $stmt->fetchAll();
            return $resultado;
        }
    }