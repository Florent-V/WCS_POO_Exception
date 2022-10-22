<?php 

require_once './MotoredVehicle.php';

class Car extends MotoredVehicule
{
    private bool $hasParkBreak = true;


    public function start()
    {
        if ($this->getHasParkBreak()) {
            throw new Exception('Park Break is on !!!!');
        }
        echo $this->forward(15);
        return 'C\'est parti !';

    }
     
    

    /**
     * Get the value of hasParkBreak
     */ 
    public function getHasParkBreak(): bool
    {
        return $this->hasParkBreak;
    }

    /**
     * Set the value of hasParkBreak
     *
     * @return  self
     */ 
    public function setHasParkBreak(bool $hasParkBreak): self
    {
        $this->hasParkBreak = $hasParkBreak;

        return $this;
    }


}

?>