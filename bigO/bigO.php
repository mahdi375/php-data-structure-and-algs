<?php
/**
 * Common Complexities:  Order by scalability (most -> less)
 *      => O(1) :constant: cte step versus args grow
 *      => O(log n) :logarithmic: 
 *      => O(n) :linear:
 *      => O(n^2) :quadratic:
 *      => O(2^n) :exponentioal
 */

 /**
  * applications have to main complexities : Time Complexity & Space (memory) Complexity....
  */

function iter (array $names, array $ages) {
    // Time => O(n)
    // Memory => O(1)
    for ($i=0; $i < count($names); $i++) { 
        # code...
        
    }

    // Time => O(m^2)
    // Memory => O(1)
    foreach($names as $first) {
        //...
        foreach($names as $second) {
            //...
        }
    }
}