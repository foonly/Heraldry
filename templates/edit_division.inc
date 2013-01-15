<?php

$tab_flds = Array("field","division","divline","divcol1","divcol2");

echo "
	Field Colour:<br/>
	".listTin("field",$coa[field])."<br class='clear'/>
	Division type:<br/>
	".listSVG($coa[division])."<br class='clear'/>
	Line type:<br/>
	".listLine("div_".$coa[division].".svg",$coa[divline])."<br/>
	Division colour:<br/>
	".listTin("divcol1",$coa[divcol1])."<br class='clear'/>
	<br class='clear'/>
	";
	
?>