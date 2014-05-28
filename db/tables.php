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
            "created" => array("type"=>"timestamp without time zone"),
            "refresh" => array("type"=>"integer","default" => 30),
            "lvl" => array("type"=>"integer","default" => 1),
        ),
        "index" => array( // List of indexes
            "indexname" => array("table"=>"tablename","definition"=>"count(foo)"),
        ),
    ),
    array(
        "type" => 3, // 1 - temporary (re-created each time), 2 - May delete columns, 3 - rename columns, 4 - do not delete
        "name" => "blog", // Name of table
        "pkey" => "id", // Primary key column(s) (comma separated)
        "cols" => array( // List the columns
            "id" => array("type"=>"serial"),
            "header" => array("type"=>"character varying"),
            "content" => array("type"=>"character varying"),
            "postdate" => array("type"=>"timestamp without time zone"),
            "poster" => array("type"=>"uuid"),
        ),
    ),
    array(
        "type" => 3, // 1 - temporary (re-created each time), 2 - May delete columns, 3 - rename columns, 4 - do not delete
        "name" => "blog_comments", // Name of table
        "pkey" => "id", // Primary key column(s) (comma separated)
        "cols" => array( // List the columns
            "id" => array("type"=>"serial"),
            "parent" => array("type"=>"integer"),
            "content" => array("type"=>"character varying"),
            "postdate" => array("type"=>"timestamp without time zone"),
            "poster" => array("type"=>"uuid"),
        ),
    ),
    array(
        "type" => 3, // 1 - temporary (re-created each time), 2 - May delete columns, 3 - rename columns, 4 - do not delete
        "name" => "charge_group", // Name of table
        "pkey" => "id", // Primary key column(s) (comma separated)
        "cols" => array( // List the columns
            "id" => array("type"=>"serial"),
            "name" => array("type"=>"character varying"),
            "so" => array("type"=>"integer"),
            "cover" => array("type"=>"integer"),
        ),
    ),
    array(
        "type" => 3, // 1 - temporary (re-created each time), 2 - May delete columns, 3 - rename columns, 4 - do not delete
        "name" => "charge_name", // Name of table
        "pkey" => "id", // Primary key column(s) (comma separated)
        "cols" => array( // List the columns
            "id" => array("type"=>"serial"),
            "name" => array("type"=>"character varying"),
            "charge_group" => array("type"=>"integer"),
            "license" => array("type"=>"integer"),
        ),
    ),
    array(
        "type" => 3, // 1 - temporary (re-created each time), 2 - May delete columns, 3 - rename columns, 4 - do not delete
        "name" => "charge_var", // Name of table
        "pkey" => "id", // Primary key column(s) (comma separated)
        "cols" => array( // List the columns
            "id" => array("type"=>"serial"),
            "charge_name" => array("type"=>"integer"),
            "variation" => array("type"=>"character varying"),
            "style" => array("type"=>"integer"),
            "height" => array("type"=>"integer"),
            "width" => array("type"=>"integer"),
            "body" => array("type"=>"character varying"),
            "proper" => array("type"=>"character varying"),
            "details" => array("type"=>"character varying"),
            "license" => array("type"=>"integer"),
            "submitter" => array("type"=>"uuid"),
        ),
    ),
);
