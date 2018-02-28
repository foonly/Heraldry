<?php

class charge {
    protected $id;
    protected $name;
    protected $charge_group;
    protected $license;
    

    function __construct($itemId) {
        $item = self::getChargeItem($itemId);
        $this->id = $item['id'];
        $this->name = $item['name'];
        $this->charge_group = $item['charge_group'];
        $this->license = $item['license'];
    }

    static function getChargeList() {
        $sql = "
        select
			charge_var.id as id,
              charge_name.name as name,
              charge_name.charge_group as charge_group,
              charge_var.license as license,
              charge_var.variation as variation,
              charge_var.body as svg
            from
              charge_name left join charge_var 
              on charge_name.id = charge_var.charge_name
           
            order by
              name asc
            ";

        $query = $GLOBALS['db']->query($sql);


		
		
        $chargelist = Array();
        while ($charge_row = $query->fetch()) {
            $chargelist[] = $charge_row;
			/*generate image
			$charge = new charge($charge_row['id']);
			$chargeimg = $charge->generate();
			
			$chargelist[img] .= $chargeimg;
			 
			*/
        }
		
        return $chargelist;
    }
    

    static function getChargeItem($item) {
        $sql = "
          select
            name,
            charge_group,
            license
          from
            charge_name
          
          where
            id = ?
		  ";

        $query = $GLOBALS['db']->prepare($sql);
        $query->execute(array($item));

        return $query->fetch();
    }
}