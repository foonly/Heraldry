<?php

abstract class svg {

    abstract function generate();

    function tincture ($tincture) {
        $tincture = strtolower($tincture);
        if (!empty($GLOBALS['tincture'][$tincture])) {
            return $GLOBALS['tincture'][$tincture]['colour'];
        } elseif (preg_match("/[0-9a-f]{6}/i",$tincture,$m)) {
            return "#{$m[0]}";
        } else {
            return $tincture;
        }
    }
}