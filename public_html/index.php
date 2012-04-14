<?php

// start building the page
require("globals/init.inc");

require("globals/init_heraldry.inc");

include("headers/header.inc");

include("templates/$_GET[template].inc");

include("headers/footer.inc");

?>
