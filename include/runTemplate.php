<?php

// include .php template, and write any potential output to $sOutput.
$sOutput = "";
$fullpath = "../templates/".SECTION."/{$template}.php";
if (file_exists($fullpath)) {
    // Save all output from called php template
    ob_start();
    include $fullpath;
    $sOutput = ob_get_contents();
    ob_clean();
}
