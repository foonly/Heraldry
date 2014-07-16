<?php

class charge extends svg {
    private $id;
    private $body;
    private $color;
    private $detail = array();

    public function __construct($id) {
        if (!empty($id)) {
            $this->populate($id);
        }
    }

    public function populate($id) {
        $sql = "
            SELECT
              id,
              variation,
              height,
              width,
              body,
              proper,
              details
            FROM
              charge_var
            WHERE
              id = :variation
            ";
        $query = $GLOBALS['db']->prepare($sql);
        $query->execute(array("variation"=>$id));

        while ($row = $query->fetch()) {
            $this->id = $row['id'];

            $this->body = $row['body'];
            $this->color = $row['proper'];
            foreach (explode(",",$row['details']) as $detail) {
                list($key,$value) = explode(":",$detail,2);
                $this->detail[$key] = $value;
            }
        }

    }

    public function generate () {
        $svg = $this->body;

        $svg = str_replace("#BASE#",$this->tincture($this->color),$svg);
        foreach ($this->detail as $key => $value) {
            $svg = str_replace("#".strtoupper($key)."#",$this->tincture($value),$svg);
        }

        return $svg;
    }

}
