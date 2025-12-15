<?php

class SpeedSensor {

    private int $speed;

    public function __construct(int $speed){
        $this->speed = $speed;
    }

    function rateSpeed() : string {

        if ($this->speed < 30) {
            return "Very slow";
        } else if ($this->speed <= 60) {
            return "Suitable speed";
        } else if ($this->speed <= 80) {
            return "Moderate excess";
        } else {
            return "Serious excess";
        }
        
    }

}

?>