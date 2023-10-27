<?php
    class Persona {
        //atributos - campos
        private $nombre;
        private $profesion;

        //constructor
        public function __construct($nom, $pro) {
            $this->nombre = $nom;
            $this->profesion = $pro;
        }
        public function presentar() {
            echo "Hola, me llamo ".$this->nombre;
            echo " y soy ".$this->profesion;
            echo "<br>";
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getProfesion() {
            return $this->profesion;
        } 
    }
?>