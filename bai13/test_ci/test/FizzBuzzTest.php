<?php
namespace Test;

// use App\FizzBuzz;

// declare(strict_types=1);

use FizzBuzz;
use PHPUnit\Framework\TestCase;

final class FizzBuzzTest extends TestCase
{
    public function testNumber1(): void
    {
        $sut = new FizzBuzz;
        $actual = $sut->translate(1);
        $this->assertSame("1", $actual);
    }
    public function testNumber3(): void
    {
        $sut = new FizzBuzz;
        $actual = $sut->translate(3);
        $this->assertSame("Fizz", $actual);
    }
    public function testNumber4(): void
    {
        $sut = new FizzBuzz;
        $actual = $sut->translate(5);
        $this->assertSame("Buzz", $actual);
    }
    
    public function testNumber5(): void
    {
        $sut = new FizzBuzz;
        $actual = $sut->translate(15);
        $this->assertSame("FizzBuzz", $actual);
    }
    public function testRunReturn100Elements(): void
    {
        $sut = new FizzBuzz;
        $actual = $sut->run();
        $this->assertEquals(100, count($actual));
    }
}