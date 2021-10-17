# Bike on a grid


## Pre-requisites
- PHP 7.1 or above (no heavy frameworks are required to be installed)


## Command-line execution examples
```
php index.php PLACE 0,5,NORTH FORWARD GPS_REPORT
```
```
php index.php PLACE 0,0,NORTH TURN_LEFT GPS_REPORT
```
```
php index.php PLACE 1,2,EAST FORWARD FORWARD TURN_LEFT FORWARD GPS_REPORT
```

## Execution instructions, rules & assumptions
- All of the commands/arguments must be separated by a `space`
- Bike must be placed on the grid first using `PLACE` command/argument before any other movement or direction commands
- `PLACE` command must be followed by x,y,DIRECTION
- List of valid commands: 
```
PLACE <X>,<Y>,<Facing-direction>
FORWARD
TURN_LEFT
TURN_RIGHT
GPS_REPORT
```