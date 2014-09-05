<?php

class shield extends svg {
    private $id;
    private $field = "ffffff";
    private $division;
    private $divcol1 = "cccccc";
    private $divcol2 = "aaaaaa";
    private $type = "";

    private $ordinaries = array();
    private $charges = array();


    function __construct ($field="",$division="",$divcol1="",$divcol2="",$ordinaries="") {
        if (!empty($field)) $this->field = $field;
        if (!empty($division)) $this->setDivision($division,$divcol1,$divcol2);
        if (!empty($ordinaries)) {
            // Add ordinaries here
        }
    }

    // Setters
    function setDivision ($division,$divcol1="",$divcol2="") {
        $division = preg_replace("/[^a-z0-9]/", "_", strtolower($division));
        if (!empty($division) && file_exists($GLOBALS['setting']['svgbase']."/division/{$division}.svg")) {
            $this->division = $division;
            if (!empty($divcol1)) $this->divcol1 = $divcol1;
            if (!empty($divcol2)) $this->divcol2 = $divcol2;
            return true;
        } else {
            $this->division = NULL;
            return false;
        }
    }

    function addOrdinary ($ordinary,$color) {
        $ordinary = strtolower($ordinary);
        if (file_exists($GLOBALS['setting']['svgbase']."/ordinary/{$ordinary}.svg")) {
            $this->ordinaries[] = array(
                "name" => $ordinary,
                "color" => $color,
            );
            return true;
        } else {
            return false;
        }
    }

    function generate () {
        // Base Shield
        $shield = file_get_contents($GLOBALS['setting']['svgbase']."/shield.svg");
        $shield = str_replace("#FIELD#",$this->tincture($this->field),$shield);

        // Division
        if (!empty($this->division) && file_exists($GLOBALS['setting']['svgbase']."/division/{$this->division}.svg")) {
            $div = file_get_contents($GLOBALS['setting']['svgbase']."/division/{$this->division}.svg");

            $div = str_replace("#DIV#",$this->tincture($this->divcol1),$div);
            $div = str_replace("#DIV1#",$this->tincture($this->divcol1),$div);
            $div = str_replace("#DIV2#",$this->tincture($this->divcol2),$div);

            // TODO Divline
            if (!empty($divline)) {
                $sea = '<g id="'.$divline.'" display="none">';
                $rep = '<g id="'.$divline.'">';
                $div = str_replace($sea,$rep,$div);
                $sea = '<g id="plain">';
                $rep = '<g id="plain" display="none">';
                $div = str_replace($sea,$rep,$div);
            }
        } else {
            $div = "";
        }
        $shield = str_replace("#DIVISION#",$div,$shield);

        // Ordinaries
        $replace = "";
        foreach ($this->ordinaries as $key => $o) {
            if (file_exists($GLOBALS['setting']['svgbase']."/ordinary/{$o['name']}.svg")) {
                $ord = file_get_contents($GLOBALS['setting']['svgbase']."/ordinary/{$o['name']}.svg");
                $replace .= str_replace("#ORD#",$this->tincture($o['color']),$ord);
            }
        }
        $shield = str_replace("#ORDINARIES#",$replace,$shield);

        // Charges
        $replace = "";
        if (is_array($this->charges)) {
            foreach ($this->charges as $chg) {
                $replace .= '
                    <g id="charge'.$chg['pos'].'" transform="translate('.$chargecol[$chg['size']][$col[$chg['pos']]].' '.$chargerow[$chg['size']][$row[$chg['pos']]].') scale('.$chargesize[$chg['size']].')">
                        '.$this->charge($chg['variation'],$chg['base'],$chg['heading'],$chg['details']).'
                    </g>
                    ';
            }
        }
        $shield = str_replace("#CHARGE#",$replace,$shield);

        return $shield;
    }

}