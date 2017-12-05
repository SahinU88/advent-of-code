<?php

class MazeStepper
{
    private $maze;
    private $mazeSize;
    private $steps;
    private $position;
    
    public function __construct( $maze )
    {
        $this->maze = $maze;
        $this->mazeSize = count( $maze );
        $this->steps = 0;
        $this->position = 0;
    }
    
    public function stepThroughMaze()
    {
        if ( $this->steppedOutOfMaze() ){
            return;
        }
        
        $this->steps++;
        
        $newPosition = $this->getNextInstruction();
        $this->updateCurrentStepInstruction();
        $this->setNewPosition( $newPosition );
        
        $this->stepThroughMaze();
        
        return $this->steps;
    }
    
    private function steppedOutOfMaze()
    {
        return ( $this->position >= $this->mazeSize );
    }
    
    private function getNextInstruction()
    {
        return $this->maze[ $this->position ];
    }
    
    private function updateCurrentStepInstruction()
    {
        $this->maze[ $this->position ] += ( $this->maze[ $this->position ] < 3 ) ? 1 : -1;
    }
    
    private function setNewPosition( $position )
    {
        $this->position += $position;
    }

}

$maze = explode( PHP_EOL, file_get_contents( 'maze.txt' ) );

// takes several minutes, so beware :)
//echo ( new MazeStepper( $maze ) )->stepThroughMaze();