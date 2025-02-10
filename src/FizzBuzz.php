<?php
namespace App;

class FizzBuzz
{
    public function fizzBuzz(int $number): string
    {

        // Ensure the input is a positive integer
        if (!is_int($number) || $number < 1) {
            throw new \InvalidArgumentException("Input must be a positive integer.");
        }
        
        $output = '';
        
        if ($number % 3 === 0 && $number % 5 === 0) {
            $output = 'FizzBuzz';
        } elseif ($number % 3 === 0) {
            $output = 'Fizz';
        } elseif ($number % 5 === 0) {
            $output = 'Buzz';
        } else {
            $output = (string) $number;
        }

        return $output ?: (string)$number;

        //Here is more simplified version for this using concat
        //$output = ($number % 3 === 0 ? 'Fizz' : '') . ($number % 5 === 0 ? 'Buzz' : '');
        //return $output === '' ? (string) $number : $output;
        
    }

    public function run(int $limit = 100): void
    {
        for ($i = 1; $i <= $limit; $i++) {
            echo $this->fizzBuzz($i) . PHP_EOL;
        }
    }
}