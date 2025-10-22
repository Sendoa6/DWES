<?php
    class F3 extends Monoplaza{
        private $academia;
        public function __construct($pNombrePiloto,$pNacionalidad,$pNumeroMonoplaza,$pEscuderia,$pPuntos,$pAcademia) {
            parent::__construct($pNombrePiloto,$pNacionalidad,$pNumeroMonoplaza,$pEscuderia,$pPuntos);
            $this->academia = $pAcademia;

        }

        public function otorgarPuntos($posicion, $vueltaRapida = null){
            $posiciones = [10,8,7,6,5,4,3,2,1];

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

        public function subirCategoria($pMinimoPuntos, $subirCat){
            if ($subirCat){
                return new F2($this->nombrePiloto,$this->nacionalidad,$this->numeroMonoplaza,$this->escuderia,$this->puntos,$pMinimoPuntos );
            }
        }
    }

?>