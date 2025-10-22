<?php
    class F4 extends Monoplaza{
        private $paisCategoria;

        public function __construct($pNombrePiloto,$pNacionalidad,$pNumeroMonoplaza,$pEscuderia,$pPuntos,$pPaisCategoria) {
            parent::__construct($pNombrePiloto,$pNacionalidad,$pNumeroMonoplaza,$pEscuderia,$pPuntos);
            $this->paisCategoria = $pPaisCategoria;
        }

        public function otorgarPuntos($posicion, $vueltaRapida = null){
            $posiciones = [25,18,15,12,10,8,6,4,2,1];

            if ($this->posicionValida($posicion)){
                $puntos = $posiciones[$posicion -1] ?? 0;
                $this->puntos = $puntos;
            }
        }

        public function posicionValida($posicion){
            if ($posicion >= 1 && $posicion <= 30){
                return true;
            }
            return false;
        }

        public function subirCategoria($pAcademia, $subirCat){
            if ($subirCat){
                return new F3($this->nombrePiloto,$this->nacionalidad,$this->numeroMonoplaza,$this->escuderia,$this->puntos,$pAcademia );
            }
        }
    }

?>