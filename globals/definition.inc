<?php

$lvlnm[0] = "Read Only";
$lvlnm[2] = "User";
$lvlnm[4] = "Advanced User";
$lvlnm[6] = "Contributor";
$lvlnm[8] = "Content Admin";
$lvlnm[10] = "Admin";

$detail_colour = Array(
	"base",
	"armed",
	"langued",
	"pizzled",
	"attired",
	"unguled",
	"crined",
	"fructed",
	"leaved",
	"barbed",
	"incensed",
	"flammant",
	);

$tinctures = array(
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
$row[1]=1;
$col[1]=1;
$row[2]=1;
$col[2]=2;
$row[3]=1;
$col[3]=3;
$row[4]=2;
$col[4]=1;
$row[5]=2;
$col[5]=2;
$row[6]=2;
$col[6]=3;
$row[7]=3;
$col[7]=1;
$row[8]=3;
$col[8]=2;
$row[9]=3;
$col[9]=3;

// Size -1 (Oversize)
$chargesize[-1]=".92";
$chargerow[-1][1]=0;
$chargerow[-1][2]=0;
$chargerow[-1][3]=0;
$chargecol[-1][1]=0;
$chargecol[-1][2]=6;
$chargecol[-1][3]=12;

// Size 0 (Full)
$chargesize[0]=".75";
$chargerow[0][1]=-10;
$chargerow[0][2]=11;
$chargerow[0][3]=50;
$chargecol[0][1]=5;
$chargecol[0][2]=14;
$chargecol[0][3]=25;

// Size 1 (Large)
$chargesize[1]=".5";
$chargerow[1][1]=-6;
$chargerow[1][2]=37.5;
$chargerow[1][3]=82;
$chargecol[1][1]=5;
$chargecol[1][2]=34;
$chargecol[1][3]=65;

// Size 2 (Medium)
$chargesize[2]=".4";
$chargerow[2][1]=0;
$chargerow[2][2]=48;
$chargerow[2][3]=95;
$chargecol[2][1]=6;
$chargecol[2][2]=42;
$chargecol[2][3]=80;

// Size 3 (Small)
$chargesize[3]=".20";
$chargerow[3][1]=5;
$chargerow[3][2]=69;
$chargerow[3][3]=125;
$chargecol[3][1]=7;
$chargecol[3][2]=58;
$chargecol[3][3]=108;

?>