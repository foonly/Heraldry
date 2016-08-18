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
	
}

?>