<?php

$config = require base_path('config.php');
extract($config['gpio']);

$led = new LEDControl($red, $green, $blue);

    if(isset($_GET['action'])) {
        
        $action = $_GET['action'];

        switch($action) {
            case "ron":
                $led->setRed();
                break;
            case "roff":
                $led->setRed(0);
                break;
            case "gon":
                $led->setGreen();
                break;
            case "goff":
                $led->setGreen(0);
                break;
            case "bon":
                $led->setBlue();
                break;
            case "boff":
                $led->setBlue(0);
                break;
            case "policeon":
                $led->police(50);
                break;
            default:
                $led->allOff();
        }
    } 

view('index.php');
