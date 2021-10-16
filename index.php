<?php
require_once('./BikeOnAGrid.php');

$instance = new BikeOnAGrid();
$isValidCommand = $instance->isValidCommand($argv);

if($isValidCommand === true) {
    if($argv[1] === 'PLACE') {
        $placeArguments = explode(',', $argv[2]);
        $instance->place($placeArguments[0], $placeArguments[1], $placeArguments[2]);
    }
    if($argv[1] === 'FORWARD') {
        $instance->forward();
    }
    if($argv[1] === 'TURN_LEFT') {
        $instance->turnLeft();
    }
    if($argv[1] === 'TURN_RIGHT') {
        $instance->turnRight();
    }
}
?>