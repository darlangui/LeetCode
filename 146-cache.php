<?php
class LRUCache {
    /**
     * @param Integer $capacity
     */
    private $sv;//for store value
    private $cap;
    function __construct($capacity) {
        $this->sv=[];
        $this->cap=$capacity;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if(array_key_exists($key,$this->sv)){
            $ans=$this->sv[$key];
            unset($this->sv[$key]);
            $this->sv[$key]=$ans;
            return $ans;
        }
        return -1;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        if(array_key_exists($key,$this->sv))
            unset($this->sv[$key]);
        $n=count($this->sv);
        if($n==$this->cap){
            reset($this->sv);
            unset($this->sv[key($this->sv)]);
        }
        $this->sv[$key]=$value;
    }
}
