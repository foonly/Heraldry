<?php

class coa extends svg {
    private $id;
    private $name;
    private $mantling = "azure";
    private $lining = "argent";
    private $shield;

    function __construct() {
        $this->shield = new shield("gules","gyronny","or");
    }

    // Setters
    function setMantling ($color) {
        $this->mantling = $color;
    }
    function setLining ($color) {
        $this->lining = $color;
    }

    // Pass through to shield
    function setDivision ($division) {
        return $this->shield->setDivision($division);
    }
    function addOrdinary ($ordinary,$color) {
        return $this->shield->addOrdinary($ordinary,$color);
    }
    
	function generate () {
		$base = file_get_contents($GLOBALS['setting']['svgbase']."/base.svg");
	
		$base = str_replace("#BANNER#","",$base);
		$base = str_replace("#NAME#",$this->name,$base);
		$base = str_replace("#INNER#",$this->tincture($this->lining),$base);
		$base = str_replace("#OUTER#",$this->tincture($this->mantling),$base);
		
		$base = str_replace("#SHIELD#",$this->shield->generate(),$base);
	
		return $base;
	}


    function charge () {
        
    }

}
