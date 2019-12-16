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
        $this->nRoll = 0;
        $this->frames = array();
        for($i=0; $i<self::N_FRAMES; $i++){
            $frame = new Frame();
            array_push($this->frames, $frame);
        }
    }

    public function roll(int $pins): void
    {
        print_r("\n " . $this->currentIndex ." \n");
        if($this->currentIndex > self::N_FRAMES - 1){ 
            print_r("returned");
            return;
        }

        $currentFrame = $this->frames[$this->currentIndex]; 

        // is last frame
        if($this->currentIndex === self::N_FRAMES - 1){ 
            //check bonus roll
            if($currentFrame->isStrike()){
                $currentFrame->bonusTries = true;
                $currentFrame->setTries($pins);
                $this->nRoll++;
                $this->frames[$this->currentIndex] = $currentFrame;
            }

            if($currentFrame->isSpare()){
                $currentFrame->setTries($pins);
                $this->nRoll++;
                $this->frames[$this->currentIndex] = $currentFrame;
                $this->currentIndex++;
            }
            return;
        }

        // current frame
        $currentFrame->setTries($pins);
        $this->nRoll++;
        $this->frames[$this->currentIndex] = $currentFrame;

        // current frame is strike or is a secodn tries
        // if($currentFrame->isStrike() || ($this->nRoll % 2) == 0){
        //     $this->currentIndex++;
        // }

        if($currentFrame->endFrame()){
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
