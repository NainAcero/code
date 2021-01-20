<?php

    $file = 'config.php';
    require_once '../config/'.$file;

    class Db{
        private $link;
        private $engine;
        private $host;
        private $name;
        private $user;
        private $pass;
        private $charset;


        public function connect()
        {
            $this->engine  = LDB_ENGINE;
            $this->name    = LDB_NAME;
            $this->user    = LDB_USER;
            $this->host    = LDB_HOST;
            $this->pass    = LDB_PASS;
            $this->charset = LDB_CHARSET;

            try{
                $this->link = new PDO($this->engine.':host='.$this->host.';dbname='.$this->name.';charset='.$this->charset, $this->user, $this->pass);
                return $this->link;

            }catch(PDOException $e){
                die(sprintf('No hay conexion a la base de datos , hubo un error : %s', $e->getMessage()));
            }
        }
    }