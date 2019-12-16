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
       for($i=0; $i<11; $i++){
           $first = rand(0,10);
           $second = rand(0, 10 - $first);
           $game->roll($first);
           $game->roll($second);

           $this->assertTrue( count($game->frames) >= 1 );
       }
       print_r($game);

    }
}
