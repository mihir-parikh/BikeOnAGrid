# Bike on a grid
A command-line application simulating a bike driving on a 7 x 7 grid.


## Pre-requisites
- PHP 7.1 or above (no heavy frameworks are required to be installed)
- CLI application (E.g. Terminal)


## Command-line execution examples
```
php index.php PLACE 0,5,NORTH FORWARD GPS_REPORT


Output: (0,6), NORTH
```
```
php index.php PLACE 0,0,NORTH TURN_LEFT GPS_REPORT


Output: (0,0), WEST
```
```
php index.php PLACE 1,2,EAST FORWARD FORWARD TURN_LEFT FORWARD GPS_REPORT


Output: (3,3), NORTH
```

## Execution instructions, rules & assumptions
- All of the commands/arguments must be separated by a `space`
- Bike must be placed on the grid first using `PLACE` command/argument before any other movement or direction commands.
- `PLACE` command must be followed by x,y,DIRECTION
- List of valid commands: 
  - PLACE X,Y,Facing-direction: Put the bike at position (X,Y) facing NORTH, SOUTH, EAST or WEST, where
(0,0) is the south-west corner.
  - FORWARD: Move the bike one unit forward in the direction it is currently facing.
  - TURN_LEFT: Rotate the bike in the left direction without changing its position on the grid.
  - TURN_RIGHT: Rotate the bike in the right direction without changing its position on the grid.
  - GPS_REPORT: Output the bike's position and facing in the following format: (X, Y), Facing-direction.
- The bike cannot exit 7 x 7 grid. This includes the PLACE command.