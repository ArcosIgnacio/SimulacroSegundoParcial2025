<?php
require_once 'Vagon.php';
require_once 'VagonPasajero.php';
require_once 'VagonCarga.php';
require_once 'Locomotora.php';
require_once 'Formacion.php';

// 1. Crear locomotora
$locomotora = new Locomotora(188000, 140);

// 2. Crear vagones
$vagon1 = new VagonPasajero(2020, 20, 3, 15000, 30, 25);
$vagonCarga = new VagonCarga(2021, 15, 3, 15000, 55000);
$vagon2 = new VagonPasajero(2022, 20, 3, 15000, 50, 50);

// 3. Crear formación
$formacion = new Formacion($locomotora, 10);
$formacion->incorporarVagonFormacion($vagon1);
$formacion->incorporarVagonFormacion($vagonCarga);
$formacion->incorporarVagonFormacion($vagon2);

// 4. Incorporar 6 pasajeros
echo "Agregando 6 pasajeros: ".($formacion->incorporarPasajeroFormacion(6) ? "Éxito" : "Falló")."\n";

// 5. Mostrar vagones
echo "\nEstado de vagones:\n";
echo $vagon1."\n";
echo $vagonCarga."\n";
echo $vagon2."\n";

// 6. Incorporar 14 pasajeros
echo "\nAgregando 14 pasajeros: ".($formacion->incorporarPasajeroFormacion(14) ? "Éxito" : "Falló")."\n";

// 7. Mostrar locomotora
echo "\nLocomotora:\n".$locomotora."\n";

// 8. Promedio pasajeros
echo "\nPromedio pasajeros: ".number_format($formacion->promedioPasajeroFormacion(), 2)."\n";

// 9. Peso formación
echo "\nPeso total formación: ".$formacion->pesoFormacion()."kg\n";

// 10. Mostrar vagones final
echo "\nEstado final vagones:\n";
echo $vagon1."\n";
echo $vagonCarga."\n";
echo $vagon2."\n";

// Vagón sin completar
$vagonSinCompletar = $formacion->retornarVagonSinCompletar();
echo "\nVagón sin completar: ".($vagonSinCompletar ? $vagonSinCompletar : "Todos completos")."\n";

// Mostrar formación completa
echo "\nFormación completa:\n".$formacion;
?>