<?php

/*define the section*/
define("SECTION", "account");

require "../include/initDisplay.php";

// include .php template, and write any potential output to $sOutput.
// TODO this should probably be included somehow, otherwise code will duplicate. 
$sOutput = "";
$fullpath = "../templates/".SECTION."/{$template}.php";
if (file_exists($fullpath)) {
    // Save all output from called php template
    ob_start();
    include $fullpath;
    $sOutput = ob_get_contents();
    ob_clean();
}
// Assign output to smarty
$smarty->assign("scriptoutput",$sOutput);

// Include admin menu
include "../templates/account/account_menu.php"; // TODO This should probably be placed somewhere else.

// Check that called template is valid, index.tpl will later include it.
if ($smarty->TemplateExists("{$template}.tpl") && $template != "index") {
    $smarty->assign("template",$template);
} else {
    $smarty->assign("template","");
}

$smarty->display("index.tpl");


?>