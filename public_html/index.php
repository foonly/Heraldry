<?php

/*define the section*/
define("SECTION", "main");

require "../include/init_display.php";

// Run the template and assign to $sOutput
require "../include/runTemplate.php";

// Assign output to smarty
$smarty->assign("scriptoutput",$sOutput);

$smarty->display("index.tpl");


?>