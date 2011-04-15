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
  //put your code here
  public static function nameurl($detalle) {
    $deur=explode("/",$detalle);
    $nombrehotel=explode(".",$deur[5]);
    return $nombrehotel[0];
  }
  public static function redondeado($numero, $decimales) {
    $factor = pow(10, $decimales);
    return (round($numero*$factor)/$factor);
  }
}
?>
