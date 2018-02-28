<?php
class heraldryUser extends user {
	protected $lvl;
	
	// Getters
	public function getLvl() {
        if (empty($this->lvl)) {
            return false;
        } else {
            return $this->lvl;
        }
    }
    // Setters
    public function setLvl($lvl) {
        $this->lvl = $lvl;
    }
	//test to get level
	public static function fetchLvl ($id) {
        
        $sql = "
            SELECT
              lvl
            FROM
              users
            WHERE
            id = '$id'
            ";
        $query = $GLOBALS['db']->query($sql);
        $lvl = $query->fetch();
        
        return $lvl;
    }
}

?>