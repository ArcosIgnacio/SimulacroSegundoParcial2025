<?php

class VagonCarga extends Vagon {
    const PORCENTAJE_INDICE = 0.20;
    private $pesoMaxCarga;
    private $pesoCargaActual;

    public function __construct($anioInstalacion, $largo, $ancho, $pesoVacio, $pesoMaxCarga, $pesoCargaActual = 0) {
        parent::__construct($anioInstalacion, $largo, $ancho, $pesoVacio);
        $this->setPesoMaxCarga($pesoMaxCarga);
        $this->setPesoCargaActual($pesoCargaActual);
    }


    // Getters y Setters específicos
    public function getPesoMaxCarga() { return $this->pesoMaxCarga; }
    public function setPesoMaxCarga($max) { $this->pesoMaxCarga = $max; }
    
    public function getPesoCargaActual() { return $this->pesoCargaActual; }
    public function setPesoCargaActual($peso) { $this->pesoCargaActual = $peso; }


    
    public function incorporarCargaVagon($cantidadCarga) {
        if (($this->getPesoCargaActual() + $cantidadCarga) <= $this->getPesoMaxCarga()) {
            $this->setPesoCargaActual($this->getPesoCargaActual() + $cantidadCarga);
            return true;
        }
        return false;
    }

    public function calcularPesoVagon() {
        $indice = $this->getPesoCargaActual() * self::PORCENTAJE_INDICE;
        return $this->getPesoVacio() + $this->getPesoCargaActual() + $indice;
    }

    public function estaCompleto() {
        return $this->getPesoCargaActual() >= $this->getPesoMaxCarga();
    }

    

    public function __toString() {
        return parent::__toString()." [Carga: ".$this->getPesoCargaActual()."/".$this->getPesoMaxCarga()."kg, Peso: ".$this->calcularPesoVagon()."kg]";
    }
}

?>