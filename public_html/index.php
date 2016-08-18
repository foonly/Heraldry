<?php

/*define the section*/
define("SECTION", "main");

require "../include/initDisplay.php";

// Run the template and assign to $sOutput
require "../include/runTemplate.php";

// Assign output to smarty
$smarty->assign("scriptoutput",$sOutput);

// Include main menu
include "../templates/main/mainMenu.php"; // TODO This should probably be placed somewhere else.

$smarty->display("index.tpl");


?>