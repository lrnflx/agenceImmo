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

    /**
     * @var integer | null
     */
    private $distance;
    
    /**
     * @var string | null
     */
    private $address;


    /**
     * @var float | null
     */
    private $lat;

    /**
     * @var float | null
     */
    private $lng;

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

    public function getDistance()
    {
        return $this->distance;
    }

    public function setDistance($distance)
    {
        $this->distance = $distance;
        return $this;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function setLat($lat)
    {
        $this->lat = $lat;
        return $this;
    }

    public function getLng()
    {
        return $this->lng;
    }

    public function setLng($lng)
    {
        $this->lng = $lng;
        return $this;
    }

    public function getAddress(){
        return $this->address;
    }
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

}