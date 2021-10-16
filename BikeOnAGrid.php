<?php
class BikeOnAGrid {
    private $currentX, $currentY, $currentDirection;

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
    
    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }

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
        // The passed x & y must be within the boundary
        if(($x > 6 || $x < 0) || ($y > 6 || $y < 0)) {
            exit("Error: Bike placement must be within the 7x7 grid boundaries - i.e. between 0 to 6");
        }
        $this->currentX = $x;
        $this->currentY = $y;
        $this->currentDirection = $direction;
    }

    public function forward() {
        if($this->currentDirection === 'NORTH') {
            if($this->currentY == 6) {
                exit("Error: Bike placement must be within the 7x7 grid boundaries - i.e. between 0 to 6");
            }
            $this->currentY++;
        }
        else if($this->currentDirection === 'EAST') {
            if($this->currentX == 6) {
                exit("Error: Bike placement must be within the 7x7 grid boundaries - i.e. between 0 to 6");
            }
            $this->currentX++;
        }
        else if($this->currentDirection === 'SOUTH') {
            if($this->currentY == 0) {
                exit("Error: Bike placement must be within the 7x7 grid boundaries - i.e. between 0 to 6");
            }
            $this->currentY--;
        }
        if($this->currentDirection === 'WEST') {
            if($this->currentX == 0) {
                exit("Error: Bike placement must be within the 7x7 grid boundaries - i.e. between 0 to 6");
            }
            $this->currentX--;
        }
    }

    public function turnLeft() {
        if($this->currentDirection === 'NORTH') {
            $this->currentDirection = 'WEST';
        }
        else if($this->currentDirection === 'EAST') {
            $this->currentDirection = 'NORTH';
        }
        else if($this->currentDirection === 'SOUTH') {
            $this->currentDirection = 'EAST';
        }
        if($this->currentDirection === 'WEST') {
            $this->currentDirection = 'SOUTH';
        }
    }

    public function turnRight() {
        if($this->currentDirection === 'NORTH') {
            $this->currentDirection = 'EAST';
        }
        else if($this->currentDirection === 'EAST') {
            $this->currentDirection = 'SOUTH';
        }
        else if($this->currentDirection === 'SOUTH') {
            $this->currentDirection = 'WEST';
        }
        if($this->currentDirection === 'WEST') {
            $this->currentDirection = 'NORTH';
        }
    }

    public function gpsReport() {
        echo "($this->currentX,$this->currentY), $this->currentDirection";
    }
}
?>