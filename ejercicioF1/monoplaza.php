<?php
    abstract class Monoplaza{
        protected $nombrePiloto;
        protected $nacionalidad;
        protected $numeroMonoplaza;
        protected $escuderia;
        protected $puntos;

        public function __construct($pNombrePiloto,$pNacionalidad,$pNumeroMonoplaza,$pEscuderia,$pPuntos) {
            $this->nombrePiloto = $pNombrePiloto;
            $this->nacionalidad = $pNacionalidad;
            $this->numeroMonoplaza = $pNumeroMonoplaza;
            $this->escuderia = $pEscuderia;
            $this->puntos = $pPuntos;
        }

        abstract public function otorgarPuntos($posicion, $vueltaRapida);
        abstract public function posicionValida($posicion);
        abstract public function subirCategoria($otro, $puntosSuficientes);

    }


?>