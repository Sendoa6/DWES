<?php
    class F2 extends Monoplaza{
        private $minimoPuntos;

        public function __construct($pNombrePiloto,$pNacionalidad,$pNumeroMonoplaza,$pEscuderia,$pPuntos,$pMinimoPuntos) {
            parent::__construct($pNombrePiloto,$pNacionalidad,$pNumeroMonoplaza,$pEscuderia,$pPuntos);
            $this->minimoPuntos = $pMinimoPuntos;

        }
    
        public function otorgarPuntos($posicion, $vueltaRapida){
            $posiciones = [10,8,7,6,5,4,3,2,1];

            if ($this->posicionValida($posicion)){
                $puntos = $posiciones[$posicion -1] ?? 0;
                if ($vueltaRapida){
                    $puntos++;
                }
                $this->puntos = $puntos;
            }
        }

        public function posicionValida($posicion){
            if ($posicion >= 1 && $posicion <= 24){
                return true;
            }
            return false;
        }

        public function subirCategoria($pPatrocinador, $subirCat){
            if ($subirCat){
                return new F1($this->nombrePiloto,$this->nacionalidad,$this->numeroMonoplaza,$this->escuderia,$this->puntos,$pPatrocinador );
            }
        }
    }

?>