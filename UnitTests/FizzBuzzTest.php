<?php
namespace UniTests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class FizzBuzzTest extends TestCase
{
    protected $fizzBuzz;

    protected function setUp(): void
    {
        $this->fizzBuzz = new \App\FizzBuzz();
    }

    public function testFizzBuzz()
    {
        ob_start();
        $this->fizzBuzz->run(10);
        $output = ob_get_clean();

        // Expected output for numbers 1 to 10
        $expectedOutput = "1\n2\nFizz\n4\nBuzz\nFizz\n7\n8\nFizz\nBuzz\n";

        $this->assertSame($expectedOutput, $output);
    }

    public function testZero()
    {
        ob_start();
        $this->fizzBuzz->run(limit: 0);
        $output = ob_get_clean();

        // Expected output null 
        $expectedOutput = "";

        $this->assertSame($expectedOutput, $output);
    }

    public function testNonInteger()
    {
        // Expect a TypeError instead of InvalidArgumentException
        $this->expectException(\TypeError::class);

        // Use reflection to bypass PHP's type checking for the test
        $reflectionMethod = new \ReflectionMethod($this->fizzBuzz, 'run');
        $reflectionMethod->invoke($this->fizzBuzz, 'hello');
    }
}