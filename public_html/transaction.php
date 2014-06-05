<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Wrong method, use POST";
    exit();
}


require "../include/init.php";



$sOutput = "";
$fullpath = "../transaction/{$t}.inc";
if (file_exists($fullpath)) {
    // Save all output from called php template
    ob_start();
    include $fullpath;
    $sOutput = ob_get_contents();
    ob_clean();
}
/*
// Assign output to smarty
$smarty->assign("scriptoutput",$sOutput);
*/
include("../transaction/$_GET[t].inc");


?>