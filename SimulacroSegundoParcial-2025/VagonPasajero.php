<?php

class VagonPasajero extends Vagon {
    const PESO_PASAJERO = 50;
    private $maxPasajeros;
    private $pasajerosActuales;

    public function __construct($anioInstalacion, $largo, $ancho, $pesoVacio, $maxPasajeros, $pasajerosActuales = 0) {
        parent::__construct($anioInstalacion, $largo, $ancho, $pesoVacio);
        $this->maxPasajeros = $maxPasajeros;
        $this->pasajerosActuales = $pasajerosActuales;
    }

    // Getters y Setters específicos
    public function getMaxPasajeros() { return $this->maxPasajeros; }
    public function setMaxPasajeros($max) { $this->maxPasajeros = $max; }
    
    public function getPasajerosActuales() { return $this->pasajerosActuales; }
    public function setPasajerosActuales($cantidad) { $this->pasajerosActuales = $cantidad; }


    public function incorporarPasajeroVagon($cantidad) {
        $bandera = false;
        if (($this->getPasajerosActuales() + $cantidad) <= $this->getMaxPasajeros()) {
            $this->setPasajerosActuales($this->getPasajerosActuales() + $cantidad);
            $bandera = true;
        }
        return $bandera;
    }

    public function calcularPesoVagon() {
        return $this->getPesoVacio() + ($this->getPasajerosActuales() * self::PESO_PASAJERO);
    }

    public function estaCompleto() {
        return $this->getPasajerosActuales() >= $this->getMaxPasajeros();
    }

    
    

    public function __toString() {
        return parent::__toString()." [Pasajeros: ".$this->getPasajerosActuales()."/".$this->getMaxPasajeros().", Peso: ".$this->calcularPesoVagon()."kg]";
    }
}

?>
