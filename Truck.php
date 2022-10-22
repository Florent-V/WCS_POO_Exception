<?php 

require_once './MotoredVehicle.php';

class Truck extends MotoredVehicule
{
    private int $capacity;
    private int $loading = 0;

    public function __construct(string $color, int $nbSeats, string $energy, int $capacity)
    {
        parent::__construct($color, $nbSeats, $energy);
        $this->setCapacity($capacity);
    }

    public function toLoad(int $quantity)
    {
        if ($quantity>0 && $this->loading + $quantity <= $this->capacity ) {
            $this->loading += $quantity;
            return 'Le camion est chargé à ' . $this->loading . ' m3 sur ' . $this->capacity . ' m3' . '<br>';
        } else {
            $overfill = $quantity - ($this->capacity - $this->loading);
            $this->loading = $this->capacity;
            return 'Le camion est chargé au maximum, il y a ' . $overfill . ' m3 en trop';
        }
    }

    public function toEmpty()
    {
        $this->loading = 0;
        return 'Truck is Empty !';
    }





    /**
     * Get the value of loading
     */ 
    public function getLoading()
    {
        return $this->loading;
    }

    /**
     * Set the value of loading
     *
     * @return  self
     */ 
    public function setLoading($loading) : self
    {
        switch (true) {
            case $loading < 0:
                $this->loading = 0;
                break;
            case $loading > $this->capacity:
                $this->loading = $this->capacity;
                echo 'Warning Truck is overloaded !';
                break;
            default:
                $this->loading = $loading;
                echo 'Truck is Loaded';
        }
        return $this;
    }

    /**
     * Get the value of capacity
     */ 
    public function getCapacity() : int
    {
        return $this->capacity;
    }

    /**
     * Set the value of capacity
     *
     * @return  self
     */ 
    public function setCapacity($capacity) : self
    {
        $this->capacity = $capacity<0 ? 0 : $capacity;
        return $this;
    }
}

?>