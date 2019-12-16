<?php
namespace Bowling;

use Exception;

class Game
{
    public $frames;
    public const N_FRAMES = 10;
    public $currentIndex;
    public $nRoll;

    public function __construct()
    {
        $this->currentIndex = 0;
        $this->nRoll = 1;
        $this->frames = array();
        for($i=0; $i<self::N_FRAMES; $i++){
            $frame = new Frame();
            array_push($this->frames, $frame);
        }
    }

    public function roll(int $pins): void
    {
        // current frame
        $currentFrame = $this->frames[$this->currentIndex]; 
        
        // is last frame
        if($this->currentIndex >= self::N_FRAMES - 1){ 
            
        } 

        $currentFrame->setTries($pins);
        $this->nRoll++;
        $this->frames[$this->currentIndex] = $currentFrame;

        // current frame is strike or is a secodn tries
        print_r( "Roll " . $this->nRoll );
        if($currentFrame->isStrike() || ($this->nRoll % 2) == 0){
            print_r( "is strike or " .  $this->nRoll);
            $this->currentIndex++;
        }

    }

    public function score(): int
    {
        $score = "";
        
        foreach($this->frames as $key => $frame){
            $score .= $frame->getScore() . " ";  
        }

        return $score;
    }
}
