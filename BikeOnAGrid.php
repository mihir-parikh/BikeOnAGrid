<?php
class BikeOnAGrid {
    private $currentX, $currentY, $currentDirection;

    public function isValidCommand($command) {
        if(!isset($command[1])) {
            exit("Error: No command is passed as an argument.\n");
        }
        else if(strpos($command[1], 'PLACE') === FALSE && $command[1] !== 'FORWARD' && $command[1] !== 'TURN_LEFT' 
        && $command[1] !== 'TURN_RIGHT' && $command[1] !== 'GPS_REPORT') {
            exit("Error: Please pass a valid command from PLACE, FORWARD, TURN_LEFT, TURN_RIGHT, GPS_REPORT.\n");
        }
        else {
            // A valid command
            return true;
        }
    }
}
?>