<?php

require "../globals/init.inc";
require "../globals/init_display.inc";

$template = $_GET['template'];


$sOutput = "";
if (file_exists("../templates/{$template}.inc")) {
    // Save all output from called php template
    ob_start();
    include "../templates/{$template}.inc" ;
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