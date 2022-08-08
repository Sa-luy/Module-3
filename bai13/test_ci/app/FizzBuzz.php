<?php
final class FizzBuzz
{
    public function translate($num) {
        if ( $num % 15 == 0 ) {
            return "FizzBuzz";
        }
        if ( $num % 3 == 0 ) {
            return "Fizz";
        }
        if ( $num % 5 == 0 ) {
            return "Buzz";
        }
        return strval($num);
    }
   
    public function run() {
        $output = array();
        for($i = 0; $i < 100; $i++) {
            $output[$i] = $this->translate($i + 1);
        }
        return $output;
    }
    
}