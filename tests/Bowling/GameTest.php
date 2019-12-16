<?php
namespace Bowling;

use Bowling\Frame;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testShallPass(): void
    {
        $this->assertEquals(1, 1);
    }


    public function testSingleFrame(): void
    {
        $this->assertEquals(1, 1);
        $frame = new Frame();
        $frame->setTries(1);
        $frame->setTries(9);
        $this->assertTrue($frame->spare);
        $this->assertEquals("1/", $frame->getScore());

        $frame = new Frame();
        $frame->setTries(10);
        //s$frame->setTries(9);
        $this->assertTrue($frame->strike);
        $this->assertEquals("X", $frame->getScore());

        $this->assertIsString($frame->getScore());
    }

    public function testGame(): void
    {
       $game = new Game();

       for($i=0; $i<10; $i++){
           $game->roll(rand(0,10));
       }

       print_r($game->currentIndex);

       print_r($game->frames);
    }
}
