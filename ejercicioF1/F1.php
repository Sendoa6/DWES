<?php
    class F1 extends Monoplaza{
        private $patrocinador;
        
        public function __construct($pNombrePiloto,$pNacionalidad,$pNumeroMonoplaza,$pEscuderia,$pPuntos,$pPatrocinador) {
            parent::__construct($pNombrePiloto,$pNacionalidad,$pNumeroMonoplaza,$pEscuderia,$pPuntos);
            $this->patrocinador = $pPatrocinador;

        }
        public function otorgarPuntos($posicion, $vueltaRapida){
            $posiciones = [25,18,15,12,10,8,6,4,2,1];

            if ($this->posicionValida($posicion)){
                $puntos = $posiciones[$posicion -1] ?? 0;
                if ($vueltaRapida){
                    $puntos++;
                }
                $this->puntos = $puntos;
            }

        }

        public function posicionValida($posicion){
            if ($posicion >= 1 && $posicion <= 22){
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