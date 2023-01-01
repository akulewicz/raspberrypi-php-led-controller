<?php

class LEDControl
{
    private $GPIORed;
    private $GPIOGreen;
    private $GPIOBlue;
    
    public function __construct($red, $green, $blue)
    {
        $this->GPIORed = $red;
        $this->GPIOGreen = $green;
        $this->GPIOBlue = $blue;
        system("gpio -g mode {$this->GPIORed} out");
        system("gpio -g mode {$this->GPIOGreen} out");
        system("gpio -g mode {$this->GPIOBlue} out");
    }

    public function setRed($power = 1)
    {
        system("gpio -g write {$this->GPIORed} {$power}");
    }

    public function setBlue($power = 1)
    {
        system("gpio -g write {$this->GPIOBlue} {$power}");
    }

    public function setGreen($power = 1)
    {
        system("gpio -g write {$this->GPIOGreen} {$power}");
    }

    public function allOff()
    {
        $this->setRed(0);
        $this->setGreen(0);
        $this->setBlue(0);
    }

    public function police($times)
    {
        $this->allOff();

        for($i=1; $i<=$times; $i++) {
            $this->setRed(0.2);usleep(10000);
            $this->setRed(0.8);usleep(10000);
            $this->setRed(1.0);usleep(10000);
            $this->setRed(0.8);usleep(10000);
            $this->setRed(0.2);usleep(10000);
            $this->setRed(0.0);usleep(10000);

            usleep(50000);

            $this->setBlue(0.2);usleep(10000);
            $this->setBlue(0.8);usleep(10000);
            $this->setBlue(1.0);usleep(10000);
            $this->setBlue(0.8);usleep(10000);
            $this->setBlue(0.2);usleep(10000);
            $this->setBlue(0.0);usleep(10000);
        }
    }
}

