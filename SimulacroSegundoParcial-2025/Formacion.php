<?php

class Formacion {
    private $locomotora;
    private $vagones = [];
    private $maxVagones;

    public function __construct($locomotora, $maxVagones) {
        $this->locomotora = $locomotora;
        $this->maxVagones = $maxVagones;
    }

    public function incorporarVagonFormacion($vagon) {
        $bandera = false;
        if (count($this->getVagones()) < $this->getMaxVagones()) {
            $this->vagones[] = $vagon;
            $bandera = true;
        }
        return $bandera;
    }

    // Getters y Setters
    public function getLocomotora() { return $this->locomotora; }
    public function setLocomotora($locomotora) { $this->locomotora = $locomotora; }
    
    public function getVagones() { return $this->vagones; }
    
    public function getMaxVagones() { return $this->maxVagones; }
    public function setMaxVagones($max) { $this->maxVagones = $max; }




    public function incorporarPasajeroFormacion($cantidad) {
        $bandera = false;

        foreach ($this->getVagones() as $vagon) {
            if ($vagon instanceof VagonPasajero && !$vagon->estaCompleto()) {
                if ($vagon->incorporarPasajeroVagon($cantidad)) {
                    $bandera = true;
                }
            }
        }
        return $bandera;
    }

    public function promedioPasajeroFormacion() {
        $totalPasajeros = 0;
        $vagonesPasajeros = 0;
        
        foreach ($this->getVagones() as $vagon) {
            if ($vagon instanceof VagonPasajero) {
                $totalPasajeros += $vagon->getPasajerosActuales();
                $vagonesPasajeros++;
            }
        }
        
        return $vagonesPasajeros > 0 ? $totalPasajeros / $vagonesPasajeros : 0;
    }

    public function pesoFormacion() {
        $pesoTotal = $this->getLocomotora()->getPeso();
        foreach ($this->getVagones() as $vagon) {
            $pesoTotal += $vagon->calcularPesoVagon();
        }
        return $pesoTotal;
    }

    public function retornarVagonSinCompletar() {
        $bandera = null;
        
        foreach ($this->getVagones() as $vagon) {
            if (!$vagon->estaCompleto()) {
                $bandera = $vagon;
            }
        }
        return $bandera;
    }


    public function __toString() {
        $info = "Formación:\n".$this->getLocomotora()."\nVagones (".count($this->getVagones())."/".$this->getMaxVagones()."):\n";
        foreach ($this->getVagones() as $vagon) {
            $info .= "- ".$vagon."\n";
        }
        return $info;
    }
}

?>
