<?php

function hexToHslArray($hex) {
    $rgbArray = hexToRgbArray($hex);

    return rgbArrayToHslArray($rgbArray);
}