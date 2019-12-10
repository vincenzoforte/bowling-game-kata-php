<?php
namespace Bowling;

use Exception;
use Bowling\Frame;

class Game
{
    private $frames; 
    private $nRolls;
    private $current; 

    public function __constructor()
    {
        $frames = array();
        //initialize game
        for($i=0; $i < 10; $i++){
            $frames[$i] = new Frame();
        }
        $nRolls = 0;
        $current = 0;
    }

    public function roll(int $pins): void
    {
        if($current === 9){
            //is last frame, 
        }
       
        $currentFrame = $this->frames[$this->current];

        if($currentFrame->pinsFirstTries === null ){ //first Tries
            $currentFrame->firstTries($pins);
        }else{ //second Tries in current frame    
            if(!$currentFrame->isStrike()){
                $currentFrame->secondTries($pins);
                $current++;
            } 
        }
        $nRolls++;
    }

    public function score(): int
    {
        throw new Exception("Not Yet Implemented");
    }
}
