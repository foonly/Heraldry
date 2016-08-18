<?php

define("ENTRY", "db");

include "../include/init.php";

include "tables.php";
include "views.php";

include "foondb/dbtable.class.php";
include "foondb/dbview.class.php";

/*define schema , maybe somewhere else?*/
$schem = "public";
$GLOBALS['db']->schema($schem);


$keys = array_keys($views);

for ($i = count($keys)-1;$i >= 0;$i--) {
    $view = $keys[$i];
    $sql = "
		DROP VIEW IF EXISTS {$view}
		";
    $db->query($sql);
}

foreach ($tables as $tab) {
    $table = new dbtable($tab);
    $table->execute();
}

foreach ($views as $name => $definition) {
    $view = new dbview($name,$definition);
    $view->create();
}
