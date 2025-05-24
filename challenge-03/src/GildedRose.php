<?php
namespace App;

class GildedRose extends Item
{
    public function tick()
    {
        if ($this->name === 'Sulfuras, Hand of Ragnaros') {
            return;
        }

        $decrement = stripos($this->name, 'Conjured') === 0 ? 2 : 1;

        if ($this->name === 'Aged Brie') {
            $this->quality++;
        } elseif ($this->name === 'Backstage passes to a TAFKAL80ETC concert') {
            if ($this->sellIn > 10) {
                $this->quality++;
            } elseif ($this->sellIn > 5) {
                $this->quality += 2;
            } elseif ($this->sellIn > 0) {
                $this->quality += 3;
            } else {
                $this->quality = 0;
            }
        } else {
            $this->quality -= $decrement;
        }

        $this->quality = max(0, min(50, $this->quality));

        $this->sellIn--;

        if ($this->sellIn < 0) {
            if ($this->name === 'Aged Brie') {
                $this->quality++;
            } elseif ($this->name === 'Backstage passes to a TAFKAL80ETC concert') {
                $this->quality = 0;
            } else {
                $this->quality -= $decrement;
            }
            $this->quality = max(0, min(50, $this->quality));
        }
    }
}
