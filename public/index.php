<?php

require_once '../init/init.php';
require_once '../init/initView.php';

/* menu array */
$menu = array(array('href' => 'news', 'name' => 'News'),array('href' => 'link2', 'name' => 'Menu 2'),array('href' => 'link3', 'name' => 'Menu 3'));
/*check for template*/
if (empty($_GET['template'])) {
	$template = $menu[0]['href'];
} else {
    $template = $_GET['template'];
}
/*check for section*/
if (empty($_GET['section'])) {
	$section = 'main';
} else {
    $section = $_GET['section'];
}

$data = array();

/*include a controller for database queries*/
require_once '../controller/main.php';

/*combine common vars and page specific vars*/
$common_var = array('tmenu' => $menu, 'selected' => $template);
$page_var = array('name1' => 'Tommy', 'userc' => $user, 'data' => $data);
$twig_var = $common_var + $page_var;

echo $twig->render($section.'/'.$template.'.twig', $twig_var);

?>