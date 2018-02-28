<?php
include '../functions/news.class.php';
switch ($template) {
	
    case "news":
       
		/*News*/
		$data['news'] = news::getNewsList();
		break;
	 /*News comments*/
	case "news_post":
		$blogid = $_GET['blogid'];
		$newsItem = new news($blogid);

		//$newsItem->getNewsComments();

		$data['newsItem'] = news::getNewsItem($blogid);
		$data['newsComments'] = news::getNewsComments($blogid);
        break;
	 
    case "link2":
        
        break;
    case "link3":
        
        break;
}

?>