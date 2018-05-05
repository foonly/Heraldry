<?php
include '../functions/admin/users.class.php';
include '../functions/admin/charge.class.php';
switch ($template) {
	
    case "info":
       
		/*News*/
		$data['info'] = users::getUserList();
		break;
	
	 
    case "charges":
        /*Charges*/
		$data['info'] = charge::getChargeList();
        break;
    case "link3":
        
        break;
}

?>