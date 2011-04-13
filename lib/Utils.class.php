<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utils
 *
 * @author usuario
 */
class Utils {
   public static function isUTF8($string)
  {
    for ($idx = 0, $strlen = strlen($string); $idx < $strlen; $idx++) {
      $byte = ord($string[$idx]);

      if ($byte & 0x80) {
        if (($byte & 0xE0) == 0xC0) {
          $bytes_remaining = 1; // 2 byte char
        } elseif (($byte & 0xF0) == 0xE0) {
          $bytes_remaining = 2; // 3 byte char
        } elseif (($byte & 0xF8) == 0xF0) {
          $bytes_remaining = 3; // 4 byte char
        } else {
          return false;
        }

        if ($idx + $bytes_remaining >= $strlen) {
          return false;
        }

        while ($bytes_remaining--) {
          if ((ord($string[++$idx]) & 0xC0) != 0x80) {
            return false;
          }
        }

      }

    }

    return true;
  }
  public static function slugify($string, $max_words=10, $max_length=65)
  {
    if (self::isUTF8($string))  $string = utf8_decode($string);
    $string = trim(strtolower($string));
    $strlength = strlen($string);
    $retval = "";

    for ($i = 0; $i<$strlength; $i++) {

      $ascii = ord($string[$i]);

      if ($ascii == 32 || $ascii == 95 || $ascii == 45) { // " ", "_", "-"
        $retval .= "-";
      } elseif ($ascii == 241 || $ascii == 209) { // "enie"
        $retval .= "n";
      } elseif (($ascii >= 48 && $ascii <= 57) || ($ascii  >= 65 && $ascii  <= 90) ||
                ($ascii >= 97 && $ascii <= 122) ) { // "0-9", "A-Z", "a-z", "-"
        $retval .= $string[$i];
      } elseif (($ascii >= 192 && $ascii <= 197) || ($ascii >= 224 && $ascii <= 229)) {
        $retval .= "a";
      } elseif (($ascii >= 200 && $ascii <= 203) || ($ascii >= 232 && $ascii <= 235)) {
        $retval .= "e";
      } elseif (($ascii >= 204 && $ascii <= 207) || ($ascii >= 236 && $ascii <= 239)) {
        $retval .= "i";
      } elseif (($ascii >= 210 && $ascii <= 214) || ($ascii >= 242 && $ascii <= 246)) {
        $retval .= "o";
      } elseif (($ascii >= 217 && $ascii <= 220) || ($ascii >= 249 && $ascii <= 252)) {
        $retval .= "u";
      }

    }

    $arr_patron = array("/^_{1,}/", "/^-{1,}/", "/_+\$/", "/-+\$/", "/_{2,}/", "/-{2,}/");
    $arr_replace = array("", "", "", "", "_", "-");
    $retval = preg_replace ($arr_patron , $arr_replace , $retval);

    do {
      list($arr_words) = array_chunk(explode("-", $retval), $max_words);
      $retval = implode("-", $arr_words);

      $strlength = strlen($retval);
      $max_words --;
    } while ($strlength > $max_length);


    return $retval;

  }
}
?>
