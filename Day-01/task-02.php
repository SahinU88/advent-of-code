<?php

$input = $argv[ 1 ] ?? false;

if ( !isset( $input ) || empty( $input ) )
{
    echo 'Please give a sequence of numbers.';
    die();
}

$sum = 0;
$numbers = str_split( $input );
$numbers = array_chunk( $numbers, ceil( count( $numbers ) / 2 ) );

while ( ( $a = array_shift( $numbers[ 0 ] ) ) && ( $b = array_shift( $numbers[ 1 ] ) ) ){
    $sum = ( $a == $b ) ? $sum + ( $a + $b ) : $sum;
}

echo $sum;