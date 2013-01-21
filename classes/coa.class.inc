<?php

class coa {
    private $id;
    private $name;
    private $mantling = "ffffff";
    private $lineing = "ffffff";
    private $field = "inner";
    private $division;
    private $divcol1 = "cccccc";
    private $divcol2 = "aaaaaa";
    
    private $ordinaries;
    private $charges;

    function __construct() {
        
    }
    
	function render ($coa = Array()) {
		global $setting, $tinct;

		if (!$coa[lineing]) $coa[lineing] = "FFFFFF";
		if (!$coa[mantling]) $coa[mantling] = "FFFFFF";
		if (!$coa[field]) $coa[field] = "inner";
		if (!$coa[divcol1]) $coa[divcol1] = "CCCCCC";
		if (!$coa[divcol2]) $coa[divcol2] = "AAAAAA";
			
		$base = "";
		if ($handle = fopen("$setting[svgbase]/base.svg","r")) {
	 		while (!feof($handle)) {
				$base .= fgets($handle, 4096);
			}
			fclose($handle);		
		}
	
		$base = str_replace("#BANNER#",$coa[banner],$base);
		$base = str_replace("#NAME#",$coa[name],$base);
		$base = str_replace("#INNER#",$tinct[$coa[lineing]],$base);
		$base = str_replace("#OUTER#",$tinct[$coa[mantling]],$base);
		
		$shield = renderShield($coa[field],$coa[division],$coa[divline],$coa[divcol1],$coa[divcol2],$coa[ordinaries],$coa[charges]);
		$base = str_replace("#SHIELD#",$shield,$base);
	
		return $base;
	}

}

?>