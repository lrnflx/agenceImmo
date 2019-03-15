<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert; 

class PropertySearch
{
    private $maxPrice;
    
    /**
     * @Assert\Range(min=10,max=400)
     */
    private $minSurface;

    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    public function getMinSurface()
    {
        return $this->minSurface;
    }

    public function setMaxPrice($maxPrice)
    {
        $this->maxPrice = $maxPrice;
    }

    public function setMinSurface($minSurface)
    {
        $this->minSurface = $minSurface;
    }

}