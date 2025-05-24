<?php
namespace App;

class Item
{
    public $name;
    public $quality;
    public $sellIn;

    public function __construct(string $name, int $quality, int $sellIn)
    {
        $this->name    = $name;
        $this->quality = $quality;
        $this->sellIn  = $sellIn;
    }

    public static function of(string $name, int $quality, int $sellIn): self
    {
        return new static($name, $quality, $sellIn);
    }
}
