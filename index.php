<?php
require_once('./BikeOnAGrid.php');

$instance = new BikeOnAGrid();

// Arg 0 is the script name
for($i = 1; $i < count($argv); $i++) {
    $isValidCommand = false;

    // Bike must be placed in the grid first
    if($i == 1) {
        if($argv[$i] !== "PLACE") {
            exit("Error: Bike must be placed in the grid first. First command must be a PLACE command. \n");
        }
        else {
            // If the arguments for PLACE command do not exist
            if(!isset($argv[2])) {
                exit("Error: Valid arguments in the form of X,Y,DIRECTION is not passed for the command PLACE.\n");
            }
            else {
                $isValidCommand = true;
            }
        }
    }

    // Skip the bike placement arguments
    if($i == 2) {
        // Not a separate command 
        continue;
    }

    // Command validity
    if($i != 1 && $i != 2) {
        $isValidCommand = $instance->isValidCommand($argv[$i]);
    }

    if($isValidCommand === true) {
        if($i == 1 && $argv[$i] === "PLACE") {
            $placeArguments = explode(',', $argv[2]);
            $instance->place($placeArguments[0], $placeArguments[1], $placeArguments[2]);
        }
        if($argv[$i] === 'FORWARD') {
            $instance->forward();
        }
        if($argv[$i] === 'TURN_LEFT') {
            $instance->turnLeft();
        }
        if($argv[$i] === 'TURN_RIGHT') {
            $instance->turnRight();
        }
        if($argv[$i] === 'GPS_REPORT') {
            $instance->gpsReport();
        }
    }
}
?>