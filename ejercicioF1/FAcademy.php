<?php
    class FAcademy extends Monoplaza{
        private $potenciaMaxima;

        public function __construct($pNombrePiloto,$pNacionalidad,$pNumeroMonoplaza,$pEscuderia,$pPuntos,$pPotenciaMaxima) {
            parent::__construct($pNombrePiloto,$pNacionalidad,$pNumeroMonoplaza,$pEscuderia,$pPuntos);
            $this->potenciaMaxima = $pPotenciaMaxima;
        }

        public function otorgarPuntos($posicion, $vueltaRapida){
            $posiciones = [18,15,12,10,8,6,4,2,1];

            if ($this->posicionValida($posicion)){
                $puntos = $posiciones[$posicion -1] ?? 0;
                if ($vueltaRapida){
                    $puntos++;
                }
                $this->puntos = $puntos;
            }
        }
        public function posicionValida($posicion){
            if ($posicion >= 1 && $posicion <= 18){
                return true;
            }
            return false;
        }

        public function subirCategoria($pPaisCategoria, $subirCat){
            if ($subirCat){
                return new F4($this->nombrePiloto,$this->nacionalidad,$this->numeroMonoplaza,$this->escuderia,$this->puntos,$pPaisCategoria );
            }
        }
    }

?>