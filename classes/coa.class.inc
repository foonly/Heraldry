<?php

class coa {
    private $id;
    private $name;
    private $mantling = "ffff00";
    private $lining = "ffffff";
    private $field = "ffffff";
    private $division;
    private $divcol1 = "cccccc";
    private $divcol2 = "aaaaaa";
    
    private $ordinaries = array();
    private $charges = array();

    function __construct() {
        
    }

    // Setters
    function setDivision ($division) {
        $division = preg_replace("/[^a-z0-9]/", "_", strtolower($division));
        if (!empty($division) && file_exists($GLOBALS['setting']['svgbase']."/div_{$division}.svg")) {
            $this->division = $division;
            return true;
        } else {
            $this->division = NULL;
            return false;
        }
    }
    
    function addOrdinary ($ordinary,$color) {
        if (!empty($ordinary) && file_exists($GLOBALS['setting']['svgbase']."/ord_{$ordinary}.svg")) {
            $this->ordinaries[] = array(
                "name" => $ordinary,
                "color" => $color,
                );
            return true;
        } else {
            return false;
        }
    }
    
	function render () {
		$base = file_get_contents($GLOBALS['setting']['svgbase']."/base.svg");
	
		$base = str_replace("#BANNER#","",$base);
		$base = str_replace("#NAME#",$this->name,$base);
		$base = str_replace("#INNER#",$this->tincture($this->lining),$base);
		$base = str_replace("#OUTER#",$this->tincture($this->mantling),$base);
		
		$base = str_replace("#SHIELD#",$this->shield($this->field,$this->division,$this->divcol1,$this->divcol2,$this->ordinaries),$base);
	
		return $base;
	}

    function shield ($field,$division,$divcol1,$divcol2,$ordinaries) {
        // Base Shield
        $shield = file_get_contents($GLOBALS['setting']['svgbase']."/shield.svg");
        $shield = str_replace("#FIELD#",$this->tincture($field),$shield);
    
        // Division
        if (!empty($division) && file_exists($GLOBALS['setting']['svgbase']."/div_{$division}.svg")) {
            $div = file_get_contents($GLOBALS['setting']['svgbase']."/div_{$division}.svg");
                
            $div = str_replace("#DIV#",$this->tincture($divcol1),$div);
            $div = str_replace("#DIV1#",$this->tincture($divcol1),$div);
            $div = str_replace("#DIV2#",$this->tincture($divcol2),$div);
            
            // TODO Divline
            if (!empty($divline)) {
                $sea = '<g id="'.$divline.'" display="none">';
                $rep = '<g id="'.$divline.'">';
                $div = str_replace($sea,$rep,$div);
                $sea = '<g id="plain">';
                $rep = '<g id="plain" display="none">';
                $div = str_replace($sea,$rep,$div);
            }
        }
        $shield = str_replace("#DIVISION#",$div,$shield);
         
        // Ordinaries
        $replace = "";
        if (is_array($ordinaries)) {
            foreach ($ordinaries as $key => $o) {
                if (file_exists($GLOBALS['setting']['svgbase']."/ord_{$o[name]}.svg")) {
                    $ord = file_get_contents($GLOBALS['setting']['svgbase']."/ord_{$o[name]}.svg");
                    $replace .= str_replace("#ORD#",$this->tincture($o['color']),$ord);
                }
            }
        }
        $shield = str_replace("#ORDINARIES#",$replace,$shield);
         
        // Charges
        $replace = "";
        if (is_array($charges)) {
            foreach ($charges as $chg) {
                $replace .= '
                    <g id="charge'.$chg[pos].'" transform="translate('.$chargecol[$chg[size]][$col[$chg[pos]]].' '.$chargerow[$chg[size]][$row[$chg[pos]]].') scale('.$chargesize[$chg[size]].')">
                        '.$this->charge($chg[variation],$chg[base],$chg[heading],$chg[details]).'
                    </g>            
                    ';
            }
        }
        $shield = str_replace("#CHARGE#",$replace,$shield);
        
        return $shield;
    }

    function charge () {
        
    }


    function tincture ($tincture) {
        if (!empty($GLOBALS['tincture'][$tincture])) {
            return $GLOBALS['tincture'][$tincture]['colour'];
        } elseif (preg_match("/[0-9a-f]{6}/i",$tincture)) {
            return "#{$tincture}";
        } else {
            return $tincture;
        }
    }
}
