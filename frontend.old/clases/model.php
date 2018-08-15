<?php

    abstract class Model{

        protected $_db;


        public function __construct(){
            // Se conecta a la DB al instanciar la clase
            $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if ( $this->_db->connect_errno ){
                echo "Fallo al conectar a MySQL: ". $this->_db->connect_error;
                return;
            }

            $this->_db->set_charset(DB_CHARSET);

        }

    }