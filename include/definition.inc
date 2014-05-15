<?php

$lvlnm[0] = "Read Only";
$lvlnm[2] = "User";
$lvlnm[4] = "Advanced User";
$lvlnm[6] = "Contributor";
$lvlnm[8] = "Content Admin";
$lvlnm[10] = "Admin";

$GLOBALS['tincture'] = array(
    "argent" => array("tp"=>1,"colour"=>"#e7ebec"),
    "or" => array("tp"=>1,"colour"=>"#f2d73a"),
    "azure" => array("tp"=>2,"colour"=>"#2121CC"),
    "gules" => array("tp"=>2,"colour"=>"#e10404"),
    "purpure" => array("tp"=>2,"colour"=>"#884da0"),
    "sable" => array("tp"=>2,"colour"=>"#000000"),
    "vert" => array("tp"=>2,"colour"=>"#30783B"),
    "murrey" => array("tp"=>3,"colour"=>"#800040"),
    "sanguine" => array("tp"=>3,"colour"=>"#c00000"),
    "tenne" => array("tp"=>3,"colour"=>"#E0760B"),
    "ermine" => array("tp"=>4,"colour"=>"url(#FurErmine)"),
    "ermines" => array("tp"=>4,"colour"=>"url(#FurErmines)"),
    "erminois" => array("tp"=>4,"colour"=>"url(#FurErminois)"),
    "pean" => array("tp"=>4,"colour"=>"url(#FurPean)"),
    "potent" => array("tp"=>4,"colour"=>"url(#FurPotent)"),
    "counter potent" => array("tp"=>4,"colour"=>"url(#FurCounterPotent)"),
    "vair" => array("tp"=>4,"colour"=>"url(#FurVair)"),
    "counter vair" => array("tp"=>4,"colour"=>"url(#FurCounterVair)"),
    );

// Position & size
$position = array(
    1 => array("row"=>0,"col"=>0),
    2 => array("row"=>0,"col"=>1),
    3 => array("row"=>0,"col"=>2),
    4 => array("row"=>1,"col"=>0),
    5 => array("row"=>1,"col"=>1),
    6 => array("row"=>1,"col"=>2),
    7 => array("row"=>2,"col"=>0),
    8 => array("row"=>2,"col"=>1),
    9 => array("row"=>2,"col"=>2),
    );

$charge = array(
    // Oversize
    -1 => array(
        "size" => .92,
        "row" => array(0,0,0),
        "col" => array(0,6,12),
        ),
    // Full
    0 => array(
        "size" => .75,
        "row" => array(-10,11,50),
        "col" => array(5,14,25),
        ),
    // Large
    1 => array(
        "size" => .5,
        "row" => array(-6,37.5,82),
        "col" => array(5,34,65),
        ),
    // Medium
    2 => array(
        "size" => .4,
        "row" => array(0,48,95),
        "col" => array(6,42,80),
        ),
    // Small
    3 => array(
        "size" => .2,
        "row" => array(5,69,125),
        "col" => array(7,58,108),
        ),
    // Mini
    4 => array(
        "size" => .12,
        "row" => array(5,69,125),
        "col" => array(7,58,108),
        ),
    );
