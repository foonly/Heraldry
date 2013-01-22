<?php

class coa {
    private $id;
    private $name;
    private $mantling = "ffff00";
    private $lineing = "ffffff";
    private $field = "ffffff";
    private $division;
    private $divcol1 = "cccccc";
    private $divcol2 = "aaaaaa";
    
    private $ordinaries;
    private $charges;

    function __construct() {
        
    }
    
	function render () {
		$base = file_get_contents($GLOBALS['setting']['svgbase']."/base.svg");
	
		$base = str_replace("#BANNER#","",$base);
		$base = str_replace("#NAME#",$this->name,$base);
		$base = str_replace("#INNER#",$this->tincture($this->lineing),$base);
		$base = str_replace("#OUTER#",$this->tincture($this->mantling),$base);
		
		$base = str_replace("#SHIELD#",$this->shield(),$base);
	
		return $base;
	}

    function shield () {
        // Base Shield
        $shield = file_get_contents($GLOBALS['setting']['svgbase']."/shield.svg");
        $shield = str_replace("#FIELD#",$this->tincture($this->field),$shield);
    
        // Division
        /*
        $div = "";
        if (strlen($division)) {
            if ($handle = fopen("$setting[svgbase]/div_$division.svg","r")) {
                while (!feof($handle)) {
                    $buffer = fgets($handle, 4096);
                    $div .= $buffer;
                }
                fclose($handle);        
            }
            $div = str_replace("#DIV#",$tinct[$divcol1],$div);
            $div = str_replace("#DIV1#",$tinct[$divcol1],$div);
            $div = str_replace("#DIV2#",$tinct[$divcol2],$div);
            if (strlen($divline)) {
                $sea = '<g id="'.$divline.'" display="none">';
                $rep = '<g id="'.$divline.'">';
                $div = str_replace($sea,$rep,$div);
                $sea = '<g id="plain">';
                $rep = '<g id="plain" display="none">';
                $div = str_replace($sea,$rep,$div);
            }
        }
        $shield = str_replace("#DIVISION#",$div,$shield);
        
         * 
         */
         
        // Ordinaries
        /*
        $ord = "";
        if (is_array($ordinaries)) {
            foreach ($ordinaries as $o) {
                if (strlen(trim($o[tp]))) {
                    if ($handle = fopen("$setting[svgbase]/ord_$o[tp].svg","r")) {
                        while (!feof($handle)) {
                            $buffer = fgets($handle, 4096);
                            $ord .= $buffer;
                        }
                        fclose($handle);
                        $ord = str_replace("#ORD#",$tinct[$o[col]],$ord);
                    }
                }
            }
        }
        $shield = str_replace("#ORDINARIES#",$ord,$shield);
         * 
         */
         
        // Charges
        /*
        $chg_text = "";
        if (is_array($charges)) {
            foreach ($charges as $chg) {
                $chg_text .= '
                    <g id="charge'.$chg[pos].'" transform="translate('.$chargecol[$chg[size]][$col[$chg[pos]]].' '.$chargerow[$chg[size]][$row[$chg[pos]]].') scale('.$chargesize[$chg[size]].')">
                        '.renderCharge($chg[variation],$chg[base],$chg[heading],$chg[details]).'
                    </g>            
                    ';
            }
        }
        $shield = str_replace("#CHARGE#",$chg_text,$shield);
         * 
         */
        
        return $shield;
    }



    function tincture ($tincture) {
        if (!empty($GLOBALS['tincture'][$tincture])) {
            return $GLOBALS['tincture'][$tincture];
        } elseif (preg_match("/[0-9a-f]{6}/i",$tincture)) {
            return "#{$tincture}";
        }
    }
}

?>