<?php

class Locomotora {
    private $peso; // en kg
    private $velocidadMaxima; // en km/h

    public function __construct($peso, $velocidadMaxima) {
        $this->setPeso($peso);
        $this->setVelocidadMaxima($velocidadMaxima);
    }

    // Getters y Setters
    public function getPeso() { return $this->peso; }
    public function setPeso($peso) { $this->peso = $peso; }
    
    public function getVelocidadMaxima() { return $this->velocidadMaxima; }
    public function setVelocidadMaxima($velocidad) { $this->velocidadMaxima = $velocidad; }

    public function __toString() {
        return "Locomotora [Peso: ".$this->getPeso()."kg, Velocidad: ".$this->getVelocidadMaxima()."km/h]";
    }
}

?>