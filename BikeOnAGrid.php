<?php
class BikeOnAGrid {
    private $currentX, $currentY, $currentDirection;

    const ERR_INVALID_COMMAND = "Error: Please pass a valid command from FORWARD, TURN_LEFT, TURN_RIGHT or GPS_REPORT for index 2+.\n";
    const ERR_OOB_PLACEMENT = "Error: Bike placement must be within the 7 x 7 grid boundaries - i.e. between 0 to 6\n";
    const ERR_OOB_FORWARD = "Error: Bike cannot move any further/out of 7 x 7 grid\n";

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
        if($command !== 'FORWARD' && $command !== 'TURN_LEFT' && $command !== 'TURN_RIGHT' && $command !== 'GPS_REPORT') {
            exit(BikeOnAGrid::ERR_INVALID_COMMAND);
        }
        
        // A valid command
        return true;
    }

    public function place($x, $y, $direction) {
        // The passed x & y must be within the boundary
        if(($x > 6 || $x < 0) || ($y > 6 || $y < 0)) {
            exit(BikeOnAGrid::ERR_OOB_PLACEMENT);
        }
        $this->currentX = $x;
        $this->currentY = $y;
        $this->currentDirection = $direction;
    }

    public function forward() {
        if($this->currentDirection === 'NORTH') {
            if($this->currentY == 6) {
                exit(BikeOnAGrid::ERR_OOB_FORWARD);
            }
            $this->currentY++;
        }
        else if($this->currentDirection === 'EAST') {
            if($this->currentX == 6) {
                exit(BikeOnAGrid::ERR_OOB_FORWARD);
            }
            $this->currentX++;
        }
        else if($this->currentDirection === 'SOUTH') {
            if($this->currentY == 0) {
                exit(BikeOnAGrid::ERR_OOB_FORWARD);
            }
            $this->currentY--;
        }
        if($this->currentDirection === 'WEST') {
            if($this->currentX == 0) {
                exit(BikeOnAGrid::ERR_OOB_FORWARD);
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
        else if($this->currentDirection === 'WEST') {
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
        else if($this->currentDirection === 'WEST') {
            $this->currentDirection = 'NORTH';
        }
    }

    public function gpsReport() {
        echo "($this->currentX, $this->currentY), $this->currentDirection \n";
    }
}
?>