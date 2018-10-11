<?php

  function rgbToHsl($r, $g, $b){
    $r = $r / 255;
    $g = $g / 255;
    $b = $b / 255;

    $max = max(array($r, $g, $b));
    $min = min(array($r, $g, $b));



    $h = $s = $l = ($max + $min) / 2;
    if($max == $min) {
      $h = 0;
      $s = 0;
    } else {
      $d = $max - $min;

      $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);

      switch ($max) {
        case $r:
          $h = ($g - $b) / $d + ($g < $b ? 6 : 0);
          break;
        case $g: 
          $h = ($b - $r) / $d + 2;
          break;
        case $b: 
          $h = ($r - $g) / $d + 4;
          break;

      }

      $h = $h / 6;
    }
    

    $array = [($h*100+0.5)|0, (($s*100+0.5)|0) . '%', (($l*100+0.5)|0) . '%'];
  
    return $array[0] . ", " . $array[1] . ", " . $array[2];
  }
