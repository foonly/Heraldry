<?php

/*define the section*/
define("SECTION", "admin");

require "../include/init_display.php";

// Run the template and assign to $sOutput
require "../include/runTemplate.php";

// Assign output to smarty
$smarty->assign("scriptoutput",$sOutput);

// Include admin menu
include "../templates/admin/admin_menu.php"; // TODO This should probably be placed somewhere else.

$smarty->display("index.tpl");


?>
