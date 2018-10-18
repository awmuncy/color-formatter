<?php

function rgbArrayToHslArray($color=array(0,0,0)) {
  $r = $color[0];
  $g = $color[1];
  $b = $color[2];


  $r = $r / 255;
  $g = $g / 255;
  $b = $b / 255;
  

  $max = max(array($r, $g, $b));
  $min = min(array($r, $g, $b));
  $l = ($max + $min) / 2;
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
    // We multiply by 3.6 because CSS hue is process by degrees
    $h = ($h / 6) * 3.6;
  }

  $final_h = (($h*100+0.5)|0);
  $final_s = (($s*100+0.5)|0) . '%';
  $final_l = (($l*100+0.5)|0) . '%';

  $hslColorArray = array(
    $final_h,
    $final_s,
    $final_l
  );

  return $hslColorArray;
}
