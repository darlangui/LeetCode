<?php
class Solution {

    /**
     * @param Integer[] $asteroids
     * @return Integer[]
     */
    function asteroidCollision($asteroids) {
        // rsort($asteroids);
        $i=0;
        $output=[];
        for($i=0;$i<count($asteroids);$i++){
            $output=$this->check_output($asteroids[$i],$output);
        }
        return $output;
    }
    function check_output($value,$output){
        // print_r($output);
        if(count($output)){
            $target = array_pop($output);
            if(($target>0 && $value<0) ){
                if(abs($target)>abs($value)){
                    array_push($output,$target);
                }else if (abs($target)<abs($value)){
                    return $this->check_output($value,$output);
                }
            }else{
                array_push($output,$target);
                array_push($output,$value);
            }
        }else{
            array_push($output,$value);
        }
        return $output;
    }

}