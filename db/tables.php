<?php

// Note default string values must be quoted.

// Table definitions
$tables = array(
    array(
        "type" => 3, // 1 - temporary (re-created each time), 2 - May delete columns, 3 - rename columns, 4 - do not delete
        "name" => "users", // Name of table
        "pkey" => "id", // Primary key column(s) (comma separated)
        "cols" => array( // List the columns
            "id" => array("type"=>"uuid","default"=>"public.uuid_generate_v4()"),
            "email" => array("type"=>"character varying"),
            "fname" => array("type"=>"character varying"),
            "lname" => array("type"=>"character varying"),
            "passwd" => array("type"=>"character varying"),
            "refresh" => array("type"=>"integer","default" => 30),
        ),
        "index" => array( // List of indexes
            "indexname" => array("table"=>"tablename","definition"=>"count(foo)"),
        ),
    ),
);
