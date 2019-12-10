<?php
namespace Bowling;

use Exception;

class Frame
{
    public $pinsFirstTries = null; //number of pins first tries 
    public $pinsSecondTries = null; //number of pins second tries
    public $spare = null;
    public $strike = null;


    public function __constructor()
    {
        
    }

    public function firstTries(int $pins)
    {
        $this->$pinsFirstTries = $pins;
        if($pins === 10){
            $this->$strike = true;
        }
    }

    public function secondTries(int $pins)
    {
        if($this->$strike) {
            $this->$pinsSecondTries = 0;
            return;
        }

        $this->$pinsSecondTries = $pins;
        $pinsFrame = $this->$pinsFirstTries + $this->$pinsSecondTries;

        if($pinsFrame === 10 && !$strike){
            $this->$spare = true;
        }
    }

    public function isStrike()
    {
        return $strike;
    }

    public function isSpare()
    {
        return $spare;
    }

}