<?php
namespace Bowling;

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /** @var Game */
    private $game;

    public function setUp(): void
    {
        $this->game = new Game();
    }

    public function testGutterGame(): void
    {
        $this->markTestSkipped();

        $this->rollMany(0, 20);
        $this->assertScore(0);
    }

    public function testOnesGame(): void
    {
        $this->markTestSkipped();

        $this->rollMany(1, 20);
        $this->assertScore(20);
    }

    public function testOneSpareGame(): void
    {
        $this->markTestSkipped();

        $this->roll(5);
        $this->roll(5);
        $this->roll(3);
        $this->rollMany(0, 17);
        $this->assertScore(16);
    }

    public function testFakeSpareGame(): void
    {
        $this->markTestSkipped();

        $this->roll(0);
        $this->roll(5);
        $this->roll(5);
        $this->roll(3);
        $this->rollMany(0, 16);
        $this->assertScore(13);
    }

    public function testOneStrikeGame(): void
    {
        $this->markTestSkipped();

        $this->roll(10);
        $this->roll(3);
        $this->roll(4);
        $this->rollMany(0, 16);
        $this->assertScore(24);
    }

    public function testAlternativeSpareGame(): void
    {
        $this->markTestSkipped();

        $this->roll(0);
        $this->roll(10);
        $this->roll(3);
        $this->roll(4);
        $this->rollMany(0, 16);
        $this->assertScore(20);
    }

    public function testStrikeAndSpareGame(): void
    {
        $this->markTestSkipped();

        $this->roll(10);
        $this->roll(3);
        $this->roll(7);
        $this->roll(4);
        $this->roll(4);
        $this->rollMany(0, 14);
        $this->assertScore(42);
    }

    public function testStrikeAndStrikeGame(): void
    {
        $this->markTestSkipped();

        $this->roll(10);
        $this->roll(10);
        $this->roll(3);
        $this->roll(4);
        $this->rollMany(0, 14);
        $this->assertScore(47);
    }

    public function testLastFrameGame(): void
    {
        $this->markTestSkipped();

        $this->rollMany(0, 18);
        $this->roll(3);
        $this->roll(4);
        $this->assertScore(7);
    }

    public function testLastSpareGame(): void
    {
        $this->markTestSkipped();

        $this->rollMany(0, 18);
        $this->roll(3);
        $this->roll(7);
        $this->roll(9);
        $this->assertScore(19);
    }

    public function testLastStrikeGame(): void
    {
        $this->markTestSkipped();

        $this->rollMany(0, 18);
        $this->roll(10);
        $this->roll(3);
        $this->roll(4);
        $this->assertScore(17);
    }

    public function testLastStrikeAndSpareGame(): void
    {
        $this->markTestSkipped();

        $this->rollMany(0, 18);
        $this->roll(10);
        $this->roll(3);
        $this->roll(7);
        $this->assertScore(20);
    }

    public function testPerfectGame(): void
    {
        $this->markTestSkipped();

        $this->rollMany(10, 12);
        $this->assertScore(300);
    }

    private function assertScore(int $score): void
    {
        $this->assertEquals($score, $this->game->score());
    }

    private function rollMany(int $pins, int $times): void
    {
        for ($i = 0; $i < $times; $i++) {
            $this->roll($pins);
        }
    }

    private function roll(int $pins): void
    {
        $this->game->roll($pins);
    }
}
