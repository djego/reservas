<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of methos
 *
 * @author Administrador
 */
class appFrontend {
  
  public static $mont = array (
    1 => 'Enero',
    2 => 'Febrero',
    3 => 'Marzo',
    4 => 'Abril',
    5 => 'Mayo',
    6 => 'Junio',
    7 => 'Julio',
    8 => 'Agosto',
    9 => 'Septiembre',
    10 => 'Octubre',
    11 => 'Noviembre',
    12 => 'Diciembre');
  //put your code here
  public static function nameurl($detalle) {
    $deur = explode("/", $detalle);
    $nombrehotel = explode(".", $deur[5]);
    return $nombrehotel[0];
  }

  public static function redondeado($numero, $decimales) {
    $factor = pow(10, $decimales);
    return (round($numero * $factor) / $factor);
  }

  public static function construirselec() {
    
    $ar = array();
    for ($i = 0; $i <= 11; $i++) {
      $date = date('m Y', mktime(0, 0, 0, date('m') + $i, 1, date('Y')));
      $mes = substr($date, 0, 2) + 0;
      $year = substr($date, 3, 4);

       $ar[$year . '-' . $mes] = self::$mont[$mes] . ' ' . $year;
    }
    return $ar;
  }
  
  public static function fechasiniciales(){
    return array('fecha-inicio' => array('day' => date('d')+0, 'month' => date('Y').'-'.(date('m')+0)), 'fecha-final' => Utils::sumaDia(date('d/m/Y'), 1));
  }

}

?>
