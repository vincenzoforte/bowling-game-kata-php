<?php

namespace Bowling;

class Frame 
{
    // public $firstTires;
    // public $secondTires;
    public $spare;
    public $strike;
    // public $firstBonusTires;
    // public $secondBonusTires;
    public $tries;
    public $bonusTrise;

    public function __construct()
    {
        // $this->firstTires = 0;
        // $this->secondTires = 0;
        $this->spare = false;
        $this->strike = false;
        // $this->firstBonusTires = 0;
        // $this->secondBonusTires = 0;
        $this->tries = array(); 
    }


    public function setTries(int $score)
    {
        // score = 10 and is first tries of frame => is a strike
        if($score == 10 && count($this->tries) === 0){
            $this->strike = true;
        }
        //current frame,
        if(count($this->tries) === 1 && ($this->tries[0] + $score) === 10 ){
            $this->spare = true;
        }
        
        $this->tries[] = $score;
    }

    public function getScore()
    {
        $string = "";
        
        if($this->isStrike()){
            $string .= "X";
        }elseif($this->isSpare()){
            $string .= $this->tries[0] . "/";
        }else{
            $string .= $this->tries[0] . $this->tries[1];
        }
        //have a bonus tris
        if(count($this->tries) > 2){
            $string .= $this->tries[2] . $this->tries[3];
        }
       
        return $string;
    }

    public function isStrike()
    {
        return $this->strike;
    }

    public function isSpare()
    {
        return $this->spare;
    }


   

}