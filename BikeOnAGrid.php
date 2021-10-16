<?php
class BikeOnAGrid {
    private $currentX, $currentY, $currentDirection;

    public function isValidCommand($command) {
        if(!isset($command[1])) {
            exit("Error: No command is passed as an argument.\n");
        }
        else if($command[1] !== 'PLACE' && $command[1] !== 'FORWARD' && $command[1] !== 'TURN_LEFT' 
        && $command[1] !== 'TURN_RIGHT' && $command[1] !== 'GPS_REPORT') {
            exit("Error: Please pass a valid command from PLACE, FORWARD, TURN_LEFT, TURN_RIGHT, GPS_REPORT.\n");
        }
        else if($command[1] === 'PLACE') {
            // If the arguments for PLACE command do not exist
            if(!isset($command[2])) {
                exit("Error: Valid arguments in the form of X,Y,DIRECTION is not passed for the command PLACE.\n");
            }
        }
        
        // A valid command
        return true;
    }

    public function place($x, $y, $direction) {
        // FIXME: Temporary assumption: The passed x & y are within the boundary
        $this->currentX = $x;
        $this->currentY = $y;
        $this->currentDirection = $direction;
    }
}
?>