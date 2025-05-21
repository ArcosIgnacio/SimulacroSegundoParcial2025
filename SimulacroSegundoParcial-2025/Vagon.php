<?php

abstract class Vagon {
    protected $anioInstalacion;
    protected $largo;
    protected $ancho;
    protected $pesoVacio;

    public function __construct($anioInstalacion, $largo, $ancho, $pesoVacio) {
        $this->setAnioInstalacion($anioInstalacion);
        $this->setLargo($largo);
        $this->setAncho($ancho);
        $this->setPesoVacio($pesoVacio);
    }

    // Getters y Setters
    public function getAnioInstalacion() { return $this->anioInstalacion; }
    public function setAnioInstalacion($anio) { $this->anioInstalacion = $anio; }
    
    public function getLargo() { return $this->largo; }
    public function setLargo($largo) { $this->largo = $largo; }
    
    public function getAncho() { return $this->ancho; }
    public function setAncho($ancho) { $this->ancho = $ancho; }
    
    public function getPesoVacio() { return $this->pesoVacio; }
    public function setPesoVacio($peso) { $this->pesoVacio = $peso; }

    abstract public function calcularPesoVagon();
    abstract public function estaCompleto();

    public function __toString() {
        return "Vagón [Año: ".$this->getAnioInstalacion().", ".$this->getLargo()."x".$this->getAncho()."m, Peso vacío: ".$this->getPesoVacio()."kg]";
    }
}

?>