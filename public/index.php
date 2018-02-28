<?php

require_once '../init/init.php';
require_once '../init/initView.php';

$data = array();
/*check for template*/
if (empty($_GET['template'])) {
	$template = 'news';
} else {
    $template = $_GET['template'];
}
/* section specific controllers*/
/*check for section*/
if (empty($_GET['section'])) {
	$section = 'main';
} else {
    $section = $_GET['section'];
}
switch ($section) {
	
    case "main":
       /* menu array */
		$menu = array(array('href' => 'news', 'name' => 'News'),array('href' => 'link2', 'name' => 'Menu 2'),array('href' => 'link3', 'name' => 'Menu 3'));
		
		/*include a controller for database queries*/
		require_once '../controller/main.php';
	 	break;
    case "admin":
		/*check if user has clearance */
		if ($user->getLvl() <=4) {
			header("Location: //".$_SERVER["HTTP_HOST"].$setting['rpath']."/index.php?template=login");
			break;
		}
        /* menu array */
		$menu = array(array('href' => 'info', 'name' => 'Admin'),array('href' => 'charges', 'name' => 'Charges'),array('href' => 'link3', 'name' => 'Menu 3'));
		
		/*include a controller for database queries*/
		require_once '../controller/admin.php';
        break;
    
}


/*combine common vars and page specific vars*/
$common_var = array('tmenu' => $menu, 'selected' => $template, 'section' => $section, 'setting' => $setting);
$page_var = array('name1' => 'Tommy', 'user' => $user, 'data' => $data);
$twig_var = $common_var + $page_var;

echo $twig->render($section.'/'.$template.'.twig', $twig_var);

?>