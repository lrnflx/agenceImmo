<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert; 

class PropertySearch
{
    private $maxPrice;
    
    /**
     * @Assert\Range(min=10,max=400)
     */
    private $minSurface;

    /**
     * @var ArrayCollection
     */
    private $options;

    public function __construct()
    {
        $this->options = new ArrayCollection();
    }

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

    public function getOptions(): ArrayCollection
    {
        return $this->options;
    }

    public function setOptions(ArrayCollection $options): void
    { 
        $this->options = $options;
    }

}