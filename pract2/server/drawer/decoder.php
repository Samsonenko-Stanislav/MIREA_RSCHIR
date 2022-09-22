<?php
class Decoder{

    const TYPE_MASK = 0b11000000;
    const W_MASK =    0b00110000;
    const H_MASK =    0b00001100;
    const COL_MASK =  0b00000011;

    private int $type;
    private string $color;
    private int $width;
    private int $height;

    public function __construct($num) {
        $this->width = match (($num & self::W_MASK)>>4){
            0 => 20,
            1 => 50,
            2 => 100,
            3 => 250
        };
        $this->height = match (($num & self::H_MASK)>>2){
            0 => 20,
            1 => 50,
            2 => 100,
            3 => 250
        };
        $this->color = match ($num & self::COL_MASK){
            0 => '#000000',
            1 => '#ff0000',
            2 => '#00ff00',
            3 => '#0000ff'
        };

        $this->type = ($num & self::TYPE_MASK) >> 6;
    }

    public function draw(): void
    {
        $cx = 300;
        $cy = 300;
        $r = min($this->width, $this->height) / 2;
        $shapeSvg = match ($this->type) {
            0 => "<circle cx='$cx' cy='$cy' r='$r' fill='#$this->color'/>",
            1 => "<rect width='$this->width' height='$this->height' fill='$this->color'/>",
            2 => "<ellipse cx='$cx' cy='$cy' rx ='$cx' ry='$cy' fill='$this->color' />",
            3 => "<line x1='0' x2='$this->width' y1='0' y2='$this->height' stroke='$this->color'  stroke-width='10'/>",
        };
        echo "<svg width='500' height='500'> $shapeSvg </svg>";
    }
}
