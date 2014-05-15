<?php

/*define the section*/
define("SECTION", "main");

require "../include/init.php";
require "../include/init_display.php";


$sOutput = "";
$fullpath = "../templates/".SECTION."/{$template}.inc";
if (file_exists($fullpath)) {
    // Save all output from called php template
    ob_start();
    include $fullpath;
    $sOutput = ob_get_contents();
    ob_clean();
}

// Assign output to smarty
$smarty->assign("scriptoutput",$sOutput);

// Check that called template is valid, index.tpl will later include it.
if ($smarty->TemplateExists("{$template}.tpl") && $template != "index") {
    $smarty->assign("template",$template);
} else {
    $smarty->assign("template","");
}

$smarty->display("index.tpl");


?>