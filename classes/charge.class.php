<?php

class charge extends svg {
    private $id;
    private $body;
    private $color;
    private $height;
    private $width;
    private $scale;
    private $xoffset = 0;
    private $yoffset = 0;
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
              xoffset,
              yoffset,
              scale,
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

            if (preg_match('|<svg[^>]+width="([^"]+)"|i',$this->body,$m)) {
                $this->width = $m[1];
            } else {
                $this->width = $row['width'];
            }
            if (preg_match('|<svg[^>]+height="([^"]+)"|i',$this->body,$m)) {
                $this->height = $m[1];
            } else {
                $this->height = $row['width'];
            }

            if ($this->width > $this->height) {
                $max = $this->width;
                $yoffset = ($this->width - $this->height) / 2;
                $xoffset = 0;
            } else {
                $max = $this->height;
                $xoffset = ($this->height - $this->width) / 2;
                $yoffset = 0;
            }

            $this->scale = 100 / $max;

            // Center the charge if no offset given.
            if (empty($row['xoffset'])) $this->xoffset = $xoffset * $this->scale; else $this->xoffset = $row['xoffset'];
            if (empty($row['yoffset'])) $this->yoffset = $yoffset * $this->scale; else $this->yoffset = $row['yoffset'];

            if (!empty($row['scale'])) $this->scale *= $row['scale'];

            $this->height = $row['height'];
            $this->width = $row['width'];
            foreach (explode(",",$row['details']) as $detail) {
                if (strpos($detail,":") !== false) {
                    list($key,$value) = explode(":",$detail,2);
                    $this->detail[$key] = $value;
                }
            }
        }

    }

    public function generate ($guide=false) {
        $charge = $this->body;

        $charge = str_replace("#BASE#",$this->tincture($this->color),$charge);
        foreach ($this->detail as $key => $value) {
            $charge = str_replace("#".strtoupper($key)."#",$this->tincture($value),$charge);
        }

        if ($guide === true || $guide === false) {
            if ($guide)
                $svg = file_get_contents($GLOBALS['setting']['svgbase']."/charges/guide.svg");
            else
                $svg = file_get_contents($GLOBALS['setting']['svgbase']."/charges/base.svg");

            $svg = str_replace("#TRANSFORM#","translate({$this->xoffset},{$this->yoffset}) scale({$this->scale})",$svg);
            $svg = str_replace("#CHARGE#",$charge,$svg);

            return $svg;
        }

        return $charge;
    }

}
